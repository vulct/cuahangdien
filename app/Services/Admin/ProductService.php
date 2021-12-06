<?php

namespace App\Services\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributes;
use App\Services\UploadService;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Log;

class ProductService
{
    protected $upload;
    protected $productAttributeService;

    public function __construct(UploadService $upload, ProductAttributesService $service)
    {
        $this->upload = $upload;
        $this->productAttributeService = $service;
    }

    public function get()
    {
        return Product::with(['attributes' => function ($query) {
            $query->where('isDelete', 0);
        }])->orderbyDesc('id')->where('isDelete', 0)->get();
    }

    public function getProductIsActive($id)
    {
        return Product::where(['id' => $id, 'active' => 1, 'isDelete' => 0])
            ->with(['attributes' => function ($query) {
                $query->where('isDelete', 0);
            }])
            ->first();
    }

    /**
     * @return Builder[]|Collection
     */

    public function getProductWithCategoryIsActive()
    {
        return Category::with(['products' => function ($query) {
            $query->with(['attributes' => function ($query) {
                $query->where('isDelete', 0);
            }])->where(['isDelete' => 0, 'active' => 1]);
        }])->where(['top' => 1, 'isDelete' => 0, 'active' => 1, 'type' => 0])->get();
    }

    public function create($request): bool
    {

        try {
            $count_Category = Category::where('id', (int)$request->input('category'))->where(['type' => 0, 'isDelete' => 0, 'active' => 1])->first();
            $count_Brand = Brand::where('id', (int)$request->input('brand'))->where(['isDelete' => 0, 'active' => 1])->first();
            if ($count_Category !== null || $count_Brand !== null) {
                $category_id = (int)$request->input('category');
                $brand_id = (int)$request->input('brand');
            } else {
                Session::flash('error', 'Danh mục hoặc thương hiệu đã chọn không hợp lệ, vui lòng kiểm tra lại.');
                return false;
            }

            DB::beginTransaction();
            // upload image product
            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            } else {
                $path_image = '/storage/default/image-available.jpg';
            }
            // add product
            $product_id = Product::create([
                "name" => (string)$request->input('name'),
                "meta_title" => (string)$request->input('meta_title'),
                "keyword" => (string)$request->input('keyword'),
                "image" => $path_image,
                "description" => (string)$request->input('description'),
                "content" => (string)$request->input('content'),
                "warranty" => (string)$request->input('warranty'),
                "unit" => (string)$request->input('unit') === null ? (string)$request->input('unit') : 'Cái',
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
                "category_id" => $category_id,
                "brand_id" => $brand_id
            ])->id;

            // add attributes for product
            if (count($request->input('group-a')) <= 0) {
                Session::flash('error', 'Vui lòng thêm ít nhất một mẫu mã cho sản phẩm.');
                return false;
            }

            $dataAttributes = $request->input('group-a');

            for ($i = 0; $i < count($dataAttributes); $i++) {
                if ($dataAttributes[$i]['codename'] !== null && $this->checkValueDiscount($dataAttributes[$i]['discount']) === true) {
                    if ($this->insertAttribute($product_id, $dataAttributes[$i]) === false) {
                        DB::rollBack();
                        return false;
                    }
                } else {
                    Session::flash('error', 'Chiết khấu không được nhỏ hơn 0 và lớn hơn 100%.');
                    return false;
                }
            }

            DB::commit();

            Session::flash('success', 'Thêm sản phẩm thành công.');
        } catch (Exception $exception) {
            DB::rollBack();

            Session::flash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');

            Log::info($exception->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $product): bool
    {
        // 1. Check xem có tồn tại input name "attribute_id":
        // - Có : Update attribute đó.
        // - Không: Create attribute mới.
        // 2. Kiểm tra trong array của request với array của product
        // attribute nào không thuộc array request thì update isDelete => 1

        try {
            $count_Category = Category::where('id', (int)$request->input('category'))->where('isDelete', 0)->first();
            $count_Brand = Brand::where('id', (int)$request->input('brand'))->where('isDelete', 0)->first();
            if ($count_Category !== null || $count_Brand !== null) {
                $category_id = (int)$request->input('category');
                $brand_id = (int)$request->input('brand');
            } else {
                Session::flash('error', 'Danh mục hoặc thương hiệu đã chọn không hợp lệ, vui lòng kiểm tra lại.');
                return false;
            }

            // update image product
            $path_image = $product->image;

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }

            //update or create attributes
            $arrayAttributeChecked = [];

            $dataAttributes = $request->input('group-a');

            for ($i = 0; $i < count($dataAttributes); $i++) {

                // add attribute
                if ($dataAttributes[$i]['codename'] !== null && !isset($dataAttributes[$i]['attribute_id'])) {
                    if ($this->checkValueDiscount($dataAttributes[$i]['discount']) === true) {
                        $attribute_id = $this->productAttributeService->create($product->id, $dataAttributes[$i]);
                        if ($attribute_id === false) {
                            Session::flash('error', 'Thêm mới mẫu mã không thành công, vui lòng kiểm tra lại.');
                            return false;
                        } elseif (is_numeric($attribute_id)) {
                            $arrayAttributeChecked[] = $attribute_id;
                        }
                    } else {
                        Session::flash('error', 'Chiết khấu không được nhỏ hơn 0 và lớn hơn 100%.');
                        return false;
                    }
                }

                // update attribute
                if ($dataAttributes[$i]['codename'] !== null && isset($dataAttributes[$i]['attribute_id'])) {
                    foreach ($product['attributes'] as $att) {
                        if ((int)$dataAttributes[$i]['attribute_id'] === $att->id) {
                            if ($this->checkValueDiscount($dataAttributes[$i]['discount']) === true) {
                                if ($this->updateAttribute($dataAttributes[$i]['attribute_id'], $dataAttributes[$i]) === false) {
                                    Session::flash('error', 'Cập nhật mẫu mã không thành công, vui lòng kiểm tra lại.');
                                    return false;
                                } else
                                    $arrayAttributeChecked[] = $dataAttributes[$i]['attribute_id'];
                            } else {
                                Session::flash('error', 'Chiết khấu không được nhỏ hơn 0 và lớn hơn 100%.');
                                return false;
                            }
                        }
                    }
                }
            }

            // destroy attribute
            foreach ($product['attributes'] as $att) {
                if (!in_array($att->id, $arrayAttributeChecked)) {
                    if ($this->deleteAttribute($att->id) === false) {
                        Session::flash('error', 'Xóa mẫu mã không thành công, vui lòng kiểm tra lại.');
                        return false;
                    }
                }
            }

            // update detail product
            $product->name = (string)$request->input('name');
            $product->meta_title = (string)$request->input('meta_title');
            $product->image = $path_image;
            $product->description = (string)$request->input('description');
            $product->keyword = (string)$request->input('keyword');
            $product->content = (string)$request->input('content');
            $product->warranty = (string)$request->input('warranty');
            $product->unit = (string)$request->input('unit') === null ? 'Cái' : (string)$request->input('unit');
            $product->slug = (string)$request->input('slug');
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->save();

            Session::flash('success', 'Cập nhật thông tin sản phẩm thành công');
            return true;
        } catch (Exception $err) {
            Session::flash('error', 'Có lỗi xảy ra, vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }

    }

    public function updateAttribute($attribute_id, $data): bool
    {
        if ($this->productAttributeService->update($attribute_id, $data)) {
            return true;
        }
        return false;
    }

    public function deleteAttribute($attribute_id): bool
    {
        if ($this->productAttributeService->destroy($attribute_id)) {
            return true;
        }
        return false;
    }

    protected function insertAttribute($product_id, $data): bool
    {
        if (is_numeric($this->productAttributeService->create($product_id, $data))) {
            return true;
        }
        return false;
    }

    public function destroy($request): bool
    {
        $slug = $request->input('slug');

        $post = Product::where('slug', $slug)->first();

        if ($post) {
            return Product::where('slug', $slug)->update(['isDelete' => 1]);
        }

        return false;
    }

    public function checkValueDiscount($discount): bool
    {
        $discount_code_flag = false;

        if ($discount >= 0 && $discount < 100) {
            $discount_code_flag = true;
        }

        return $discount_code_flag;
    }

    public function getCategoryWithBrand($id)
    {
        return Product::with(['category' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }, 'brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])->where(['brand_id' => $id, 'isDelete' => 0, 'active' => 1])->get();
    }

    public function getProductByCategory($id, $limit): LengthAwarePaginator
    {
        return Product::with(['category' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }, 'brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])->where(['category_id' => $id, 'isDelete' => 0, 'active' => 1])->paginate($limit);
    }

    public function getProductByBrandAndCategory($brand, $category): LengthAwarePaginator
    {
        return Product::with(['category' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }, 'brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])
            ->where(['brand_id' => $brand, 'category_id' => $category, 'isDelete' => 0, 'active' => 1])
            ->paginate(2);
    }

    public function getCategoriesWithBrandWithoutCategory($brand, $category)
    {
        return Product::with(['category' => function ($query) use ($category) {
            $query->where(['isDelete' => 0, 'active' => 1])
                ->where('id', '!=', $category);
        }, 'brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])
            ->where(['brand_id' => $brand, 'isDelete' => 0, 'active' => 1])
            ->get();
    }

    public function getProductDiscount()
    {
        return Product::with(['attributes' => function ($query) {
            $query->where('isDelete', 0)
                ->where('discount', '>=', 40.00);
        }])
            ->where(['isDelete' => 0, 'active' => 1])
            ->get();
    }

    public function getDetailProduct($id)
    {
        return Product::with(['attributes' => function ($query) {
            $query->where('isDelete', 0);},
            'category' => function ($query) {
                $query->where(['isDelete' => 0, 'active' => 1]);},
            'brand' => function ($query) {
                $query->where(['isDelete' => 0, 'active' => 1]);
            }])->where(['id' => $id, 'isDelete' => 0, 'active' => 1])->firstOrFail();
    }

    public function getAttributesOfProduct($product,$attribute)
    {
        return ProductAttributes::where(['id' => $attribute, 'isDelete' => 0, 'product_id' => $product])
            ->first();
    }

    public function getProductWhereIn($id)
    {
        return Product::with(['attributes' => function ($query) {
            $query->where('isDelete', 0);
            }])
            ->where(['isDelete' => 0, 'active' => 1])
            ->whereIn('id',$id)
            ->get();

    }

    public function getLatest()
    {
        return Product::latest('created_at')->where(['isDelete' => 0, 'active' => 1])->first();
    }
}

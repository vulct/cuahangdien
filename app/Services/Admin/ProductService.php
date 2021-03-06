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

    public function getAllProductIsActive()
    {
        return Product::where(['isDelete' => 0, 'active' => 1])->get();
    }

    public function getListProduct($limit = 1)
    {
        return Product::where(['isDelete' => 0, 'active' => 1])->limit($limit)->get();
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
                Session::flash('error', 'Danh m???c ho???c th????ng hi???u ???? ch???n kh??ng h???p l???, vui l??ng ki???m tra l???i.');
                return false;
            }

            DB::beginTransaction();
            // upload image product
            $path_image_01 = null;
            $path_image_02 = null;
            $path_image = null;
            if ($request->hasFile('image_01')) {
                $path_image_01 = $this->upload->store($request->file('image_01'));
            }

            if ($request->hasFile('image_02')) {
                $path_image_02 = $this->upload->store($request->file('image_02'));
            }

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }

            if($path_image === null && $path_image_01 === null && $path_image_02 === null) {
                $path_image = '/storage/default/image-available.jpg';
            }

            // add product
            $product_id = Product::create([
                "name" => (string)$request->input('name'),
                "meta_title" => (string)$request->input('meta_title'),
                "keyword" => (string)$request->input('keyword'),
                "image" => $path_image,
                "image_01" => $path_image_01,
                "image_02" => $path_image_02,
                "description" => (string)$request->input('description'),
                "content" => (string)$request->input('content'),
                "warranty" => (string)$request->input('warranty'),
                "unit" => (string)$request->input('unit') === null ? (string)$request->input('unit') : 'C??i',
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
                "category_id" => $category_id,
                "brand_id" => $brand_id
            ])->id;

            $dataAttributes = $request->input('group-a');

            // add attributes for product
            if (count($dataAttributes) <= 0 || empty($dataAttributes)) {
                Session::flash('error', 'Vui l??ng th??m ??t nh???t m???t m???u m?? cho s???n ph???m.');
                return false;
            }

            for ($i = 0; $i < count($dataAttributes); $i++) {
                if ($dataAttributes[$i]['discount'] === null || $this->checkValueDiscount($dataAttributes[$i]['discount']) === true) {
                    if ($this->insertAttribute($product_id, $dataAttributes[$i]) === false) {
                        DB::rollBack();
                        return false;
                    }
                }elseif (empty($dataAttributes[$i]['codename'])){
                    Session::flash('error', 'M?? s???n ph???m kh??ng ???????c ????? tr???ng.');
                    return false;
                } else {
                    Session::flash('error', 'Chi???t kh???u kh??ng ???????c nh??? h??n 0 v?? l???n h??n 100%.');
                    return false;
                }
            }

            DB::commit();

            Session::flash('success', 'Th??m s???n ph???m th??nh c??ng.');
        } catch (Exception $exception) {
            DB::rollBack();

            Session::flash('error', 'Th??m s???n ph???m kh??ng th??nh c??ng. Vui l??ng th??? l???i.');

            return false;
        }
        return true;
    }

    public function update($request, $product): bool
    {
        // 1. Check xem c?? t???n t???i input name "attribute_id":
        // - C?? : Update attribute ????.
        // - Kh??ng: Create attribute m???i.
        // 2. Ki???m tra trong array c???a request v???i array c???a product
        // attribute n??o kh??ng thu???c array request th?? update isDelete => 1

        try {
            $count_Category = Category::where('id', (int)$request->input('category'))->where('isDelete', 0)->first();
            $count_Brand = Brand::where('id', (int)$request->input('brand'))->where('isDelete', 0)->first();
            if ($count_Category !== null || $count_Brand !== null) {
                $category_id = (int)$request->input('category');
                $brand_id = (int)$request->input('brand');
            } else {
                Session::flash('error', 'Danh m???c ho???c th????ng hi???u ???? ch???n kh??ng h???p l???, vui l??ng ki???m tra l???i.');
                return false;
            }

            // update image product

            $path_image_01 = $product->image_01;
            $path_image_02 = $product->image_02;
            $path_image = $product->image;
            if ($request->hasFile('image_01')) {
                $path_image_01 = $this->upload->store($request->file('image_01'));
            }

            if ($request->hasFile('image_02')) {
                $path_image_02 = $this->upload->store($request->file('image_02'));
            }

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }

            if (($path_image_01 !== null || $path_image_02 !== null) && $path_image == '/storage/default/image-available.jpg'){
                $path_image = null;
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
                            Session::flash('error', 'Th??m m???i m???u m?? kh??ng th??nh c??ng, vui l??ng ki???m tra l???i.');
                            return false;
                        } elseif (is_numeric($attribute_id)) {
                            $arrayAttributeChecked[] = $attribute_id;
                        }
                    } else {
                        Session::flash('error', 'Chi???t kh???u kh??ng ???????c nh??? h??n 0 v?? l???n h??n 100%.');
                        return false;
                    }
                }elseif (empty($dataAttributes[$i]['codename'])){
                    Session::flash('error', 'M?? s???n ph???m kh??ng ???????c ????? tr???ng.');
                    return false;
                }

                // update attribute
                if ($dataAttributes[$i]['codename'] !== null && isset($dataAttributes[$i]['attribute_id'])) {
                    foreach ($product['attributes'] as $att) {
                        if ((int)$dataAttributes[$i]['attribute_id'] === $att->id) {
                            if ($this->checkValueDiscount($dataAttributes[$i]['discount']) === true) {
                                if ($this->updateAttribute($dataAttributes[$i]['attribute_id'], $dataAttributes[$i]) === false) {
                                    Session::flash('error', 'C???p nh???t m???u m?? kh??ng th??nh c??ng, vui l??ng ki???m tra l???i.');
                                    return false;
                                } else
                                    $arrayAttributeChecked[] = $dataAttributes[$i]['attribute_id'];
                            } else {
                                Session::flash('error', 'Chi???t kh???u kh??ng ???????c nh??? h??n 0 v?? l???n h??n 100%.');
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
                        Session::flash('error', 'X??a m???u m?? kh??ng th??nh c??ng, vui l??ng ki???m tra l???i.');
                        return false;
                    }
                }
            }

            // update detail product
            $product->name = (string)$request->input('name');
            $product->meta_title = (string)$request->input('meta_title');
            $product->image = $path_image;
            $product->image_01 = $path_image_01;
            $product->image_02 = $path_image_02;
            $product->description = (string)$request->input('description');
            $product->keyword = (string)$request->input('keyword');
            $product->content = (string)$request->input('content');
            $product->warranty = (string)$request->input('warranty');
            $product->unit = (string)$request->input('unit') === null ? 'C??i' : (string)$request->input('unit');
            $product->slug = (string)$request->input('slug');
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->save();

            Session::flash('success', 'C???p nh???t th??ng tin s???n ph???m th??nh c??ng');
            return true;
        } catch (Exception $err) {
            Session::flash('error', 'C?? l???i x???y ra, vui l??ng th??? l???i');
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

    //getProductSortByCategory
    public function getProductFilterByBrand($id, $limit)
    {
        return Product::with(['category' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }, 'brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])->where(['isDelete' => 0, 'active' => 1])->whereIn('brand_id' ,$id)->paginate($limit);
    }

    public function getProductByBrand($id)
    {
        return Product::where(['brand_id' => $id, 'isDelete' => 0, 'active' => 1]);
    }

    public function getProductByIdOfCategory($id)
    {
        return Product::where(['category_id' => $id, 'isDelete' => 0, 'active' => 1]);
    }

    public function getProductByBrandAndCategory($brand, $category): LengthAwarePaginator
    {
        return Product::with(['category' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }, 'brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])
            ->where(['brand_id' => $brand, 'category_id' => $category, 'isDelete' => 0, 'active' => 1])
            ->paginate(8);
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
            }])->where(['id' => $id, 'isDelete' => 0, 'active' => 1])->first();
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

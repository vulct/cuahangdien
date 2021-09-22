<?php

namespace App\Services\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributes;
use App\Services\UploadService;
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
        return Product::with('attributes')->orderbyDesc('id')->where('isDelete', 0)->get();
    }

    public function create($request)
    {

        try {
            $count_Category = Category::where('id', (int)$request->input('category_id'))->where('isDelete', 0)->first();
            $count_Brand = Brand::where('id', (int)$request->input('brand_id'))->where('isDelete', 0)->first();
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
                $path_image = '/storage/uploads/default/image-available.jpg';
            }
            // add product
            $product_id = Product::create([
                "name" => (string)$request->input('name'),
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
                if ($dataAttributes[$i]['codename'] !== null) {
                    if ($this->insertAttribute($product_id, $dataAttributes[$i]) === false) {
                        DB::rollBack();
                        return false;
                    }
                }
            }
            DB::commit();
            Session::flash('success', 'Thêm sản phẩm thành công.');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Thêm sản phẩm không thành công. Vui lòng thử lại.');
            \Log::info($exception->getMessage());
            return false;
        }
        return true;
    }

    protected function insertAttribute($product_id, $data): bool
    {
        if ($this->productAttributeService->create($product_id, $data)) {
            return true;
        }
        return false;
    }

    public function update($request, $product)
    {
        // 1. Check xem có tồn tại input name "attribute_id":
        // - Có : Update attribute đó.
        // - Không: Create attribute mới.
        // 2. Kiểm tra trong array của request với array của product
        // attribute nào không thuộc array request thì update isDelete => 1

        try {
            $count_Category = Category::where('id', (int)$request->input('category_id'))->where('isDelete', 0)->first();
            $count_Brand = Brand::where('id', (int)$request->input('brand_id'))->where('isDelete', 0)->first();
            if ($count_Category !== null || $count_Brand !== null) {
                $category_id = (int)$request->input('category');
                $brand_id = (int)$request->input('brand');
            } else {
                Session::flash('error', 'Danh mục hoặc thương hiệu đã chọn không hợp lệ, vui lòng kiểm tra lại.');
                return false;
            }

            DB::beginTransaction();
            // update image product
            $path_image = $product->image;

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }

            //update or create attributes
            $arrayAttributeChecked = [];
            $dataAttributes = $request->input('group-a');
            for ($i = 0; $i < count($dataAttributes); $i++) {
                if ($dataAttributes[$i]['codename'] !== null && $dataAttributes[$i]['attribute_id'] === null) {
                    if ($this->insertAttribute($product->id, $dataAttributes[$i]) === false) {
                        DB::rollBack();
                        return false;
                    }
                }elseif($dataAttributes[$i]['codename'] !== null && $dataAttributes[$i]['attribute_id'] !== null){
                    foreach ($product['attributes'] as $att){
                        // update attribute
                        if ($dataAttributes[$i]['attribute_id'] === $att->id){
                            if ($this->updateAttribute($dataAttributes[$i]['attribute_id'],$dataAttributes[$i]) === false) {
                                DB::rollBack();
                                return false;
                            }
                            $arrayAttributeChecked = $dataAttributes[$i]['attribute_id'];
                        }
                    }
                }
            }

            // destroy attribute
            foreach ($product['attributes'] as $att){
                if (!in_array($att->id, $arrayAttributeChecked)){
                    if ($this->deleteAttribute($dataAttributes[$i]['attribute_id']) === false) {
                        DB::rollBack();
                        return false;
                    }
                }
            }

            // update detail product
            $product->name = (string)$request->input('name');
            $product->image = $path_image;
            $product->description = (string)$request->input('description');
            $product->content = (string)$request->input('content');
            $product->warranty = (string)$request->input('name');
            $product->unit = (string)$request->input('unit') === null ? (string)$request->input('unit') : 'Cái';
            $product->slug = (string)$request->input('slug');
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->save();
            Session::flash('success', 'Cập nhật thông tin sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi xảy ra, vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
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
}

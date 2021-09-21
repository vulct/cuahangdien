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
            $count_Category = Category::where('id', (int)$request->input('category_id'))->where('isDelete', 0)->get();
            $count_Brand = Brand::where('id', (int)$request->input('brand_id'))->where('isDelete', 0)->get();
            if ($count_Category !== null || $count_Brand !== null || (int)$request->input('category_id') === 0 || (int)$request->input('brand_id')) {
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

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thông tin sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi xảy ra, vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}

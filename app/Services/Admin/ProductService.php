<?php

namespace App\Services\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadService;
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
        return Product::orderbyDesc('id')->where('isDelete', 0)->get();
    }


    public function insert($request)
    {

        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

//    public function get()
//    {
//        return Product::with('menu')
//            ->orderByDesc('id')->paginate(15);
//    }

    public function create($request)
    {
        try {
            // upload image product
            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            } else {
                $path_image = '/storage/uploads/default/image-available.jpg';
            }

            $count_Category = Category::where(['id', (int)$request->input('category_id')], ['isDelete', 0])->count();
            $count_Brand = Brand::where(['id', (int)$request->input('brand_id')], ['isDelete', 0])->count();
            if ($count_Category !== 0 && $count_Brand !== 0){
                $category_id = (int)$request->input('category_id');
                $brand_id = (int)$request->input('brand_id');
            }else{
                return false;
            }
            // add product
            $product_id = Product::create([
                "name" => (string)$request->input('name'),
                "image" => $path_image,
                "description" => (string)$request->input('description'),
                "content" => (string)$request->input('content'),
                "warranty" => (string)$request->input('warranty'),
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
                "category_id" => $category_id,
                "brand_id" => $brand_id
            ])->id;

            // add attributes for product
            for ($i = 1; $i < count($request->input('group-a')); $i++) {
                if ($request->input("group-a[$i]type_name") !== null && $request->input('group-a[0]codename') !== null){
                    if ($this->insertAttribute($product_id,$request->input("group-a[$i]"))){
                        Session::flash('success', 'Tạo sản phẩm thành công.');
                        return true;
                    }else{
                        Session::flash('error', 'Vui lòng thêm ít nhất một mẫu mã cho sản phẩm.');
                        return false;
                    }
                }
            }
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    protected function insertAttribute($product_id, $data): bool
    {
        $this->productAttributeService->create($product_id, $data);
        return true;
    }
}

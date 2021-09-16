<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Services\UploadService;
use Illuminate\Support\Facades\Session;

class ProductService
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Product::orderbyDesc('id')->where('isDelete', 0)->get();
    }

    public function create($request)
    {
        try {
            // upload image product

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }else{
                $path_image = '/storage/uploads/default/image-available.jpg';
            }

            // add attributes for product

//            try {
//
//            }
//            catch ()

            // add product

            Product::create([
                "name" => (string)$request->input('name'),
                "image" => $path_image,
                "description" => (string)$request->input('description'),
                "content" => (string)$request->input('content'),
                "warranty" => (string)$request->input('warranty'),
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
                "category_id" => (int)$request->input('category_id'),
                "brand_id" => (int)$request->input('brand_id'),
                "attribute_id" => (int)$request->input('attribute_id'),
            ]);

            Session::flash('success', 'Tạo sản phẩm thành công.');

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }
}

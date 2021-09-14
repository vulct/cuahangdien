<?php


namespace App\Services\Admin;


use App\Models\Admin\Brand;
use App\Services\UploadService;
use Illuminate\Support\Facades\Session;


class BrandService
{

    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Brand::orderbyDesc('id')->where('isDelete', 0)->get();
    }

    public function create($request)
    {
        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }else{
                $path_image = '/storage/uploads/default/image-available.jpg';
            }

            Brand::create([
                "name" => (string)$request->input('name'),
                "image" => $path_image,
                "description" => (string)$request->input('description'),
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
            ]);

            Session::flash('success', 'Tạo thương hiệu thành công.');

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function destroy($request)
    {
        $slug = $request->input('slug');

        $brand = Brand::where(['slug' => $slug, 'isDelete' => 0])->first();

        if ($brand) {
            return Brand::where(['slug' => $slug, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($brand, $brandRequest)
    {
        $path_image = $brand->image;

        if ($brandRequest->hasFile('image')) {
            $path_image = $this->upload->store($brandRequest->file('image'));
        }

        try {

            $brand->name = (string)$brandRequest->input('name');
            $brand->image = $path_image;
            $brand->description = (string)$brandRequest->input('description');
            $brand->slug = (string)$brandRequest->input('slug');
            $brand->active = (int)$brandRequest->input('active');
            $brand->save();
            Session::flash('success', 'Cập nhật thương hiệu thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

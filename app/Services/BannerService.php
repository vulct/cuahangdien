<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\Session;

class BannerService
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Banner::latest()->where('isDelete', 0)->get();
    }

    public function create($request)
    {
        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }else{
                $path_image = '/storage/uploads/default/image-available.jpg';
            }

            Banner::create([
                "title" => (string)$request->input('title'),
                "image" => $path_image,
                "alt" => (string)$request->input('alt'),
                "url" => (string)$request->input('url'),
                "active" => (int)$request->input('active'),
            ]);

            Session::flash('success', 'Tạo banner thành công.');

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function destroy($request)
    {
        $id = $request->input('slug');

        $brand = Banner::where(['id' => $id, 'isDelete' => 0])->first();

        if ($brand) {
            return Banner::where(['id' => $id, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($banner, $bannerRequest)
    {
        try {
            $path_image = $banner->image;

            if ($bannerRequest->hasFile('image')) {
                $path_image = $this->upload->store($bannerRequest->file('image'));
            }

            $banner->title = (string)$bannerRequest->input('title');
            $banner->image = $path_image;
            $banner->alt = (string)$bannerRequest->input('alt');
            $banner->url = (string)$bannerRequest->input('url');
            $banner->active = (int)$bannerRequest->input('active');
            $banner->save();
            Session::flash('success', 'Cập nhật banner thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

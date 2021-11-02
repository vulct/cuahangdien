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

    function getWidthHeight($sort): array
    {
        $sort = (int)$sort;
        $data = [];
        switch ($sort){
            case 0:
                $data = [
                    'width' => 1300,
                    'height' => 804
                ];
                break;
            case 1:
            case 2:
                $data = [
                    'width' => 655,
                    'height' => 283
                ];
                break;
            case 3:
            case 4:
                $data = [
                    'width' => 300,
                    'height' => 264
                ];
                break;
            case 5:
            case 6:
                $data = [
                    'width' => 358,
                    'height' => 205
                ];
                break;
        }
        return $data;
    }

    public function checkSizeImageToSort($sort, $file): bool
    {

        $image = getimagesize($file);
        $width = $image[0];
        $height = $image[1];

        switch ($sort){
            case 0:
                if ($width == 1300 && $height == 804)
                    return true;
                break;
            case 1:
            case 2:
                if ($width == 655 && $height == 283)
                    return true;
                break;
            case 3:
            case 4:
                if ($width == 300 && $height == 264)
                    return true;
                break;
            case 5:
            case 6:
                if ($width == 358 && $height == 205)
                    return true;
                break;
        }
        return false;
    }

    public function create($request): bool
    {
        try {


            $path_image = "";
            if ($request->hasFile('image')) {
                if ($this->checkSizeImageToSort((int)$request->input('sort'),$request->file('image'))){
                    $path_image = $this->upload->store($request->file('image'));
                }else{
                    $data  = $this->getWidthHeight((int)$request->input('sort'));
                    Session::flash('error', 'Tải ảnh không thành công, vui lòng kiểm tra lại định dạng, kích thước yêu cầu: ' . $data['width'] . 'x' . $data['height'] . ' px.' );
                    return false;
                }
            }

            if ($path_image !== ""){
                Banner::create([
                    "title" => (string)$request->input('title'),
                    "image" => $path_image,
                    "alt" => (string)$request->input('alt'),
                    "url" => (string)$request->input('url'),
                    "sort" => (int)$request->input('sort'),
                    "active" => (int)$request->input('active'),
                ]);

                Session::flash('success', 'Tạo banner thành công.');
            }

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function destroy($request): bool
    {
        $id = $request->input('slug');

        $brand = Banner::where(['id' => $id, 'isDelete' => 0])->first();

        if ($brand) {
            return Banner::where(['id' => $id, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($banner, $bannerRequest): bool
    {
        try {
            $path_image = $banner->image;

            if ($bannerRequest->hasFile('image')) {
                $path_image = $this->upload->store($bannerRequest->file('image'));
            }
            if ($bannerRequest->hasFile('image')) {
                if ($this->checkSizeImageToSort((int)$bannerRequest->input('sort'),$bannerRequest->file('image'))){
                    $path_image = $this->upload->store($bannerRequest->file('image'));
                }else{
                    $data  = $this->getWidthHeight((int)$bannerRequest->input('sort'));
                    Session::flash('error', 'Tải ảnh không thành công, vui lòng kiểm tra lại định dạng, kích thước yêu cầu: ' . $data['width'] . 'x' . $data['height'] . ' px.' );
                    return false;
                }
            }

            $banner->title = (string)$bannerRequest->input('title');
            $banner->image = $path_image;
            $banner->alt = (string)$bannerRequest->input('alt');
            $banner->url = (string)$bannerRequest->input('url');
            $banner->active = (int)$bannerRequest->input('active');
            $banner->sort = (int)$bannerRequest->input('sort');
            $banner->save();
            Session::flash('success', 'Cập nhật banner thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

<?php

namespace App\Services;

use App\Models\Tariff;
use Illuminate\Support\Facades\Session;

class TariffService
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Tariff::where(['isDelete' => 0])->get();
    }

    public function create($request): bool
    {
        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }else{
                $path_image = '/storage/default/image-available.jpg';
            }

            Tariff::create([
                "name" => (string)$request->name,
                "link_download" => (string)$request->link_download,
                "language" => (string)$request->language,
                "image" => $path_image,
                "slug" => (string)$request->slug,
                "active" => (int)$request->active,
                "brand_id" => (int)$request->brand_id
            ]);

            Session::flash('success', 'Tạo báo giá thành công.');
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function update($tariff, $request): bool
    {
        try {

            if ($request->hasFile('image')) {
                $tariff->image = $this->upload->store($request->file('image'));
            }

            $tariff->name = (string)$request->name;
            $tariff->link_download = (string)$request->link_download;
            $tariff->language = (string)$request->language;
            $tariff->slug = (string)$request->slug;
            $tariff->active = (int)$request->active;
            $tariff->brand_id = (int)$request->brand_id;
            $tariff->save();

            Session::flash('success', 'Cập nhật báo giá thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }


    public function destroy($request): bool
    {
        $slug = $request->input('slug');

        $post = Tariff::where('slug', $slug)->first();

        if ($post) {
            return Tariff::where('slug', $slug)->update(['isDelete' => 1]);
        }

        return false;
    }

}

<?php

namespace App\Services;

use App\Models\Tariff;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
                "language" => (string)$request->language ?? "Tiếng Việt",
                "image" => $path_image,
                "slug" => (string)$request->slug,
                "active" => (int)$request->active,
                "brand_id" => (int)$request->brand_id
            ]);

            Session::flash('success', 'Tạo báo giá thành công.');
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function update($tariff, $request): bool
    {
        try {

            $path_image = $tariff->image;
            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }

            $tariff->name = (string)$request->name;
            $tariff->image = $path_image;
            $tariff->link_download = (string)$request->link_download;
            $tariff->language = (string)$request->language ?? "Tiếng Việt";
            $tariff->slug = (string)$request->slug;
            $tariff->active = (int)$request->active;
            $tariff->brand_id = (int)$request->brand_id;
            $tariff->save();

            Session::flash('success', 'Cập nhật báo giá thành công.');
            return true;
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }


    public function destroy($request): bool
    {
        $slug = $request->input('slug');

        $tariff = Tariff::where('slug', $slug)->first();

        if ($tariff) {
            return Tariff::where('slug', $slug)->update(['isDelete' => 1]);
        }

        return false;
    }

    public function getAll()
    {
        return Tariff::with(['brand' => function($query){
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])->where(['isDelete' => 0, 'active' => 1])->get();
    }

    public function getAllWithPaginate($id = ""): LengthAwarePaginator
    {
        if ($id === ""){
            return Tariff::with(['brand' => function($query){
                $query->where(['isDelete' => 0, 'active' => 1]);
            }])->where(['isDelete' => 0, 'active' => 1])->paginate(2);
        }

        return Tariff::with(['brand' => function($query){
            $query->where(['isDelete' => 0, 'active' => 1]);
        }])->where(['isDelete' => 0, 'active' => 1, 'brand_id' => $id])->paginate(2);

    }

    public function getDetail($id)
    {
        return Tariff::with(['brand' => function($query){
                $query->where(['isDelete' => 0, 'active' => 1]);
            }])->where(['isDelete' => 0, 'active' => 1,'id' => $id])->first();
    }

    public function getFirstTariff()
    {
        return Tariff::where(['isDelete' => 0, 'active' => 1])->latest('updated_at')->first();
    }
}

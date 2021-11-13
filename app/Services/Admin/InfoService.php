<?php

namespace App\Services\Admin;

use App\Models\Info;
use App\Services\UploadService;
use Illuminate\Support\Facades\Session;

class InfoService
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Info::latest('id')->first();
    }

    public function create($request)
    {
        try {
            if ($request->hasFile('logo')) {
                $path_logo = $this->upload->store($request->file('logo'));
            } else {
                $path_logo = null;
            }

            if ($request->hasFile('icon')) {
                $path_icon = $this->upload->store($request->file('icon'));
            } else {
                $path_icon = null;
            }

            Info::create([
                "name" => (string)$request->input('name'),
                "keyword" => (string)$request->input('keyword'),
                "description" => (string)$request->input('description'),
                "hotline1" => (string)$request->input('hotline1'),
                "hotline2" => (string)$request->input('hotline2'),
                "phone" => (string)$request->input('phone'),
                "address" => (string)$request->input('address'),
                "email" => (string)$request->input('email'),
                "tax_code" => (string)$request->input('tax_code'),
                "business_license" => (string)$request->input('business_license'),
                "map_address" => (string)$request->input('map_address'),
                "map_iframe" => (string)$request->input('map_iframe'),
                "facebook" => (string)$request->input('facebook'),
                "zalo" => (string)$request->input('zalo'),
                "sale" => (string)$request->input('sale'),
                "logo" => $path_logo,
                "icon" => $path_icon,
            ]);

            Session::flash('success', 'Tạo thông tin cửa hàng thành công.');

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function update($info, $request)
    {
        try {
            if ($request->hasFile('logo')) {
                $path_logo = $this->upload->store($request->file('logo'));
            } else {
                $path_logo = $info->logo;
            }

            if ($request->hasFile('icon')) {
                $path_icon = $this->upload->store($request->file('icon'));
            } else {
                $path_icon = $info->icon;
            }

            $info->fill($request->input());
            $info->logo = $path_logo;
            $info->icon = $path_icon;
            $info->save();
            Session::flash('success', 'Cập nhật thông tin cửa hàng thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

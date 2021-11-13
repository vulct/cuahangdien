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
            }else{
                $path_logo = null;
            }

            if ($request->hasFile('icon')) {
                $path_icon = $this->upload->store($request->file('icon'));
            }else{
                $path_icon = null;
            }

            Info::create([
                $request->all(),
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
            }else{
                $path_logo = $info->logo;
            }

            if ($request->hasFile('icon')) {
                $path_icon = $this->upload->store($request->file('icon'));
            }else{
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

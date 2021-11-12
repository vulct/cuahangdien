<?php

namespace App\Services\Admin;

use App\Models\Info;
use Illuminate\Support\Facades\Session;

class InfoService
{
    public function get()
    {
        return Info::latest('id')->first();
    }

    public function create($request)
    {
        try {
            Info::create($request->all());
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
            $info->fill($request->input());
            $info->save();
            Session::flash('success', 'Cập nhật thông tin cửa hàng thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

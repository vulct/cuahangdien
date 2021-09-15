<?php

namespace App\Services\Admin;

use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Session;

class ShippingService
{
    public function get()
    {
        return ShippingMethod::orderbyDesc('id')->where('isDelete', 0)->get();
    }

    public function create($request)
    {
        try {

            ShippingMethod::create([
                "name" => (string)$request->input('name'),
                "description" => (string)$request->input('description'),
                "active" => (int)$request->input('active'),
            ]);

            Session::flash('success', 'Tạo phương thức vận chuyển thành công.');

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function destroy($request)
    {
        $id = $request->input('slug');

        $brand = ShippingMethod::where(['id' => $id, 'isDelete' => 0])->first();

        if ($brand) {
            return ShippingMethod::where(['id' => $id, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($shippingMethod, $shippingMethodRequest)
    {
        try {

            $shippingMethod->name = (string)$shippingMethodRequest->input('name');
            $shippingMethod->description = (string)$shippingMethodRequest->input('description');
            $shippingMethod->active = (int)$shippingMethodRequest->input('active');
            $shippingMethod->save();
            Session::flash('success', 'Cập nhật phương thức vận chuyển thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

}

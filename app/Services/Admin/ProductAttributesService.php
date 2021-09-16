<?php

namespace App\Services\Admin;

use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Session;

class ProductAttributesService
{
    public function create($request)
    {
        try {
            $type_name = $request->input('type_name') !== null ? (string)$request->input('type_name') : null;
            $price = $request->input('price') !== null ? (string)$request->input('price') : null;
            $discount = $request->input('discount') !== null ? (string)$request->input('discount') : null;
            $price_sale = $request->input('sale') !== null ? (string)$request->input('sale') : null;

            $attribute_id = ProductAttributes::create([
                "type_name" => $type_name,
                "codename" => (string)$request->input('code'),
                "price_list" => $price,
                "discount" => $discount,
                "price_sale" => $price_sale,
                "active" => (int)$request->input('active_attribute'),
            ])->id;

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return $attribute_id;
    }

}

<?php

namespace App\Services\Admin;

use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Session;

class ProductAttributesService
{

    public function create($product_id, $request)
    {
        try {
            return ProductAttributes::create([
                "type_name" => $request['type_name'] === null ? "" : $request['type_name'],
                "codename" => $request['codename'],
                "price" => $request['price'],
                "discount" => $request['discount'],
                "product_id" => $product_id,
            ])->id;

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

    public function destroy($id)
    {
        $attribute = ProductAttributes::where('id', $id)->first();

        if ($attribute) {
            ProductAttributes::where('id', $id)->delete();
            return true;
        }
        return false;
    }

    public function update($attribute_id, $request)
    {
        try {
            // Get Attribute
            $attribute = ProductAttributes::where('id', $attribute_id)->first();
            // Update detail attribute
            $attribute->type_name = $request['type_name'] === null ? "" : $request['type_name'];
            $attribute->codename = $request['codename'];
            $attribute->price = $request['price'];
            $attribute->discount = $request['discount'];
            $attribute->save();
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

}

<?php

namespace App\Services\Admin;

use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Session;

class ProductAttributesService
{

    public function create($product_id, $request): bool
    {
        try {
            ProductAttributes::create([
                "type_name" => $request['type_name'] === null ? "" : $request['type_name'],
                "codename" => $request['codename'],
                "price" => $request['price'],
                "discount" => $request['discount'],
                "product_id" => $product_id,
            ]);

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($id)
    {
        $attribute = ProductAttributes::where(['id' => $id, 'isDelete' => 0])->first();

        if ($attribute) {
            return ProductAttributes::where(['slug' => $id, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($attribute_id, $request)
    {
        try {
            // Get Attribute
            $attribute = ProductAttributes::where(['id' => $attribute_id, 'isDelete' => 0])->first();
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

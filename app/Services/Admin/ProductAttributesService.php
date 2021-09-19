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

}

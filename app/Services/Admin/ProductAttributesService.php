<?php

namespace App\Services\Admin;

use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Session;

class ProductAttributesService
{
    protected function isValidPrice($request): bool
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá khuyến mãi phải nhỏ hơn giá bán thường.');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá bán thường');
            return false;
        }

        return  true;
    }

    public function create($product_id, $request)
    {
        try {
            $isValidPrice = $this->isValidPrice($request);
            if ($isValidPrice === false) return false;

            $type_name = $request->input('type_name') !== null ? (string)$request->input('type_name') : null;
            $price = $request->input('price') !== null ? (string)$request->input('price') : null;
            $price_sale = $request->input('price_sale') !== null ? (string)$request->input('price_sale') : null;

            ProductAttributes::create([
                "type_name" => $type_name,
                "codename" => (string)$request->input('codename'),
                "price_list" => $price,
                "price_sale" => $price_sale
            ]);

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

}

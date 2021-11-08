<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BrandsWithCategoryComposer
{
    public function compose(View $view)
    {
        $getList = Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0])->get();

        $data = array();

        // lấy danh mục con
        foreach ($getList as $cate){
            foreach ($getList as $item) {
                if ($item->parent_id == $cate->id) {
                    $data['subcategory'][$item->parent_id][] = $item;
                }
            }
        }

        // lấy thương hiệu
        //SELECT b.id, b.slug, b.image FROM products p INNER JOIN brands b ON p.brand_id = b.id WHERE p.category_id = 6 AND p.brand_id = b.id GROUP BY b.id

        foreach ($getList as $cate) {
            if ($cate->parent_id === 0){
                $data['brands'][$cate->id][] = DB::table('products')
                    ->select('brands.id', 'brands.slug', 'brands.image', 'brands.name')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->where('products.category_id', '=', $cate->id)
                    ->groupBy('brands.id')
                    ->get();
            }
        }


        //echo '<pre>';
        //var_dump($data['brands'][1]);
        //echo '</pre>';
        //die();

        $view->with('data', $data);
    }

}

<?php

namespace App\Http\View\Composers;

use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use Illuminate\View\View;

class BrandsWithCategoryComposer
{
    protected $subcategory = [];
    protected $brands = [];

    public function __construct(CategoryService $categoryService, BrandService $brandService)
    {
        $this->subcategory = $categoryService->get(1,0);

        $this->brands = $brandService->getBrandsWithCategory();

    }

    public function compose(View $view)
    {

        $data = array();

        // lấy danh mục con
        foreach ($this->subcategory as $cate){
            foreach ($this->subcategory as $item) {
                if ($item->parent_id == $cate->id) {
                    $data['subcategory'][$item->parent_id][] = $item;
                }
            }
        }

        // lấy thương hiệu
        foreach ($this->subcategory as $cate) {
            $data['brands'][$cate->id] = $this->brands;
        }
        $view->with('data', $data);
    }

}

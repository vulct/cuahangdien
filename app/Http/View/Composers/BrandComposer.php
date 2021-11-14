<?php

namespace App\Http\View\Composers;

use App\Services\Admin\BrandService;
use Illuminate\View\View;

class BrandComposer
{
    protected $brands;

    public function __construct(BrandService $brandService)
    {
        $this->brands = $brandService->get(1);
    }

    public function compose(View $view)
    {
        $brands = [];
        foreach ($this->brands as $brand){
            $brands[$brand->id] = $brand;
        }
        $view->with('brands', $brands);
    }
}

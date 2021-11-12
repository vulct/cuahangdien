<?php

namespace App\Http\View\Composers;

use App\Services\Admin\CategoryService;
use Illuminate\View\View;

class MenuComposer
{
    protected $category = [];

    public function __construct(CategoryService $categoryService)
    {
        $this->category = $categoryService->getParentCategory();
    }


    public function compose(View $view)
    {
        //return menu
        $view->with('categories', $this->category);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class MenuComposer
{

    public function __construct()
    {

    }


    public function compose(View $view)
    {
        //return menu
        $category = Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0, 'parent_id'=>0])->get();
        $view->with('categories', $category);
    }
}

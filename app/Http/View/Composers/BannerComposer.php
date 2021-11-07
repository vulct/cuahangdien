<?php

namespace App\Http\View\Composers;

use App\Models\Banner;
use Illuminate\View\View;

class BannerComposer
{
    public function compose(View $view)
    {
        $banner = Banner::where(['isDelete' => 0, 'active' => 1])->get();
        $view->with('banners', $banner);
    }
}

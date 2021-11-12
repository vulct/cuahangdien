<?php

namespace App\Http\View\Composers;

use App\Services\BannerService;
use Illuminate\View\View;

class BannerComposer
{
    protected $banners = [];

    public function __construct(BannerService $bannerService)
    {
        $this->banners = $bannerService->getBannerIsActive();
    }

    public function compose(View $view)
    {
        $view->with('banners', $this->banners);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Services\Admin\InfoService;
use Illuminate\View\View;

class InfoComposer
{
    protected $info;

    public function __construct(InfoService $info)
    {
        $this->info = $info->get();
    }

    public function compose(View $view)
    {
        $view->with('info', $this->info);
    }

}

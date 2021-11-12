<?php

namespace App\Http\View\Composers;

use App\Services\Admin\PageService;
use Illuminate\View\View;

class PageComposer
{

    protected $pages = [];

    public function __construct(PageService $pageService)
    {
        $this->pages = $pageService->getPageIsActive();
    }

    public function compose(View $view)
    {
        $listPage = $this->pages;
        $data = [];
        foreach ($listPage as $page){
            $data[$page->type][] = $page;
        }
        $view->with('pages', $data);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Services\Admin\GroupService;
use Illuminate\View\View;

class StaffComposer
{
    protected $staffs = [];

    public function __construct(GroupService $groupService)
    {
        $this->staffs = $groupService->getStaffIsActive();
    }

    public function compose(View $view)
    {

        $view->with('staffs', $this->staffs);
    }

}

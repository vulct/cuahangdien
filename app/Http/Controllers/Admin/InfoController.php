<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoRequest;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Info;
use App\Services\Admin\InfoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    protected $infoService;

    public function __construct(InfoService $infoService)
    {
        $this->infoService = $infoService;
    }


    public function index()
    {
        $info = $this->infoService->get();
        if (is_null($info)){
            $action = route('admin.info.store');
        }else{
            $action = route('admin.info.update', $info->id);
        }
        return view('admin.info.edit', [
            'title' => 'Thông tin hệ thống',
            'action' => $action,
            'info' => $info
        ]);
    }


    public function store(InfoRequest $request): RedirectResponse
    {
        $result = $this->infoService->create($request);
        if ($result) {
            return redirect()->route('admin.info.index');
        }
        return back();
    }


    public function update(InfoRequest $request, Info $info): RedirectResponse
    {
        $result = $this->infoService->update($info, $request);
        if ($result) {
            return redirect()->route('admin.info.index');
        }
        return back();
    }

}

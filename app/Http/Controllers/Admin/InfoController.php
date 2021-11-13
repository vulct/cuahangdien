<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Services\Admin\InfoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
        return view('admin.info.edit', [
            'title' => 'Thông tin hệ thống',
            'info' => $this->infoService->get()
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        $result = $this->infoService->create($request);
        if ($result) {
            return redirect()->route('admin.info.edit');
        }
        return back();
    }


    public function update(Request $request, Info $info): RedirectResponse
    {
        $result = $this->infoService->update($info, $request);
        if ($result) {
            return redirect()->route('admin.info.index');
        }
        return back();
    }

}

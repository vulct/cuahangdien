<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Services\Admin\InfoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    protected $infoService;

    public function __construct(InfoService $infoService)
    {
        $this->infoService = $infoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.info.edit', [
            'title' => 'Thông tin hệ thống',
            'info' => $this->infoService->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $result = $this->infoService->create($request);
        if ($result) {
            return redirect()->route('admin.info.edit');
        }
        return back();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Info $info
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Info $info): \Illuminate\Http\RedirectResponse
    {
        $result = $this->infoService->update($info, $request);
        if ($result) {
            return redirect()->route('admin.info.index');
        }
        return back();
    }

}

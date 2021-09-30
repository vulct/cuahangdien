<?php

namespace App\Services\Admin;

use App\Models\Page;
use Illuminate\Support\Facades\Session;

class PageService
{
    public function get()
    {
        return Page::orderbyDesc('id')->where('isDelete', 0)->get();
    }

    public function create($request)
    {
        try {

            Page::create([
                "name" => (string)$request->input('name'),
                "content" => (string)$request->input('content'),
                "keyword" => (string)$request->input('keyword'),
                "description" => (string)$request->input('description'),
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
            ]);

            Session::flash('success', 'Tạo trang nội dung thành công.');

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function destroy($request)
    {
        $slug = $request->input('slug');

        $page = Page::where(['slug' => $slug, 'isDelete' => 0])->first();

        if ($page) {
            return Page::where(['slug' => $slug, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($page, $request)
    {
        try {

            $page->name = (string)$request->input('name');
            $page->content = (string)$request->input('content');
            $page->description = (string)$request->input('description');
            $page->keyword = (string)$request->input('keyword');
            $page->slug = (string)$request->input('slug');
            $page->active = (int)$request->input('active');
            $page->save();
            Session::flash('success', 'Cập nhật trang nội dung thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Page;
use Illuminate\Support\Facades\Session;

class PageService
{
    // 0 - về chúng tôi, 1 - tuyển dụng, 2 - hướng dẫn mua hàng
    // 3 - thanh toán vận chuyển, 4 - bảo hành đổi trả,
    // 5 - chính sách bảo mật

    public function get()
    {
        return Page::latest('id')->where('isDelete', 0)->get();
    }

    public function getPageIsActive()
    {
        return Page::latest('id')->where(['isDelete' => 0, 'active' => 1])->get();
    }

    public function getPageWithType($type = 0)
    {
        return Page::latest('id')->where(['isDelete' => 0, 'type' => $type, 'active' => 1])->first();
    }


    public function create($request): bool
    {
        try {
            $type = (int)$request->input('type');
            // get page with type
            $page_type = $this->getPageWithType($type);

            if (isset($page_type) && $page_type->count() < 1){
                Page::create([
                    "name" => (string)$request->input('name'),
                    "content" => (string)$request->input('content'),
                    "keyword" => (string)$request->input('keyword'),
                    "description" => (string)$request->input('description'),
                    "slug" => (string)$request->input('slug'),
                    "type" => $type,
                    "active" => (int)$request->input('active'),
                ]);

                Session::flash('success', 'Tạo trang nội dung thành công.');

            }else{
                Session::flash('error', 'Thể loại trang đã tồn tại, vui lòng sửa trang đã tạo.');
                return false;
            }


        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request): bool
    {
        $slug = $request->input('slug');

        $page = Page::where(['slug' => $slug, 'isDelete' => 0])->first();

        if ($page) {
            return Page::where(['slug' => $slug, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($page, $request): bool
    {
        try {
            $type = (int)$request->input('type');
            // get page with type
            $page_type = $this->getPageWithType($type);

            if ($page_type->count() > 1){
                Session::flash('error', 'Thể loại trang đã tồn tại, vui lòng sửa trang đã tạo.');
                return false;
            }else if($page_type->count() === 1 && isset($page_type[0])) {
                Session::flash('error', 'Thể loại trang đã tồn tại, vui lòng sửa trang đã tạo.');
                return false;
            }else{
                $page->name = (string)$request->input('name');
                $page->content = (string)$request->input('content');
                $page->description = (string)$request->input('description');
                $page->keyword = (string)$request->input('keyword');
                $page->slug = (string)$request->input('slug');
                $page->active = (int)$request->input('active');
                $page->type = (int)$request->input('type');
                $page->save();
                Session::flash('success', 'Cập nhật trang nội dung thành công.');
                return true;

            }

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

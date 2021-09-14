<?php

namespace App\Services\Admin;

use App\Models\Admin\Category;
use App\Services\UploadService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryService
{

    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get($parent_id = 1)
    {
        return Category::
        when($parent_id == 0, function ($query) use ($parent_id) {
            $query->where([
                ['parent_id', $parent_id],
                ['isDelete', 0]
            ]);
        },
            function ($query) {
                return $query->where('isDelete', 0);
            }
        )->get();
    }

    public function create($request): bool
    {
        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }else{
                $path_image = "";
            }

            Category::create([
                "name" => (string)$request->name,
                "parent_id" => (int)$request->cate_parent,
                "image" => $path_image,
                "description" => (string)$request->description,
                "slug" => (string)$request->slug,
                "active" => (int)$request->active
            ]);

            Session::flash('success', 'Tạo danh mục thành công.');
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request): bool
    {
        $slug = $request->input('slug');

        $category = Category::where('slug', $slug)->first();

        if ($category) {
            return DB::table('categories')->where('slug', $slug)->orWhere('parent_id', $category->id)->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($cate, $request)
    {
        try {

            if ($cate->id != $request->input('cate_parent')){
                $cate->parent_id = (int)$request->input('cate_parent');
            }

            if ($request->hasFile('image')) {
                $cate->image = $this->upload->store($request->file('image'));
            }

            $cate->name = (string)$request->input('name');
            $cate->description = (string)$request->input('description');
            $cate->slug = (string)$request->input('slug');
            $cate->active = (int)$request->input('active');
            $cate->save();
            Session::flash('success', 'Cập nhật danh mục thành công.');
            return true;
        }
        catch (\Exception $exception){
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}

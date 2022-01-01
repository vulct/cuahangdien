<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Services\UploadService;
use Illuminate\Support\Facades\Session;

class CategoryService
{

    protected $upload;
    protected $productService;

    public function __construct(UploadService $upload, ProductService $productService)
    {
        $this->upload = $upload;
        $this->productService = $productService;
    }

    public function get($active = 0, $type = 0)
    {
        // 0 - thư mục sản phẩm, 1 - thư mục bài đăng.

        if ($active === 0) {
            return Category::where(['isDelete' => 0, 'type' => $type])->get();
        }
        return Category::where(['isDelete' => 0, 'active' => $active, 'type' => $type])->get();
    }

    public function getParentCategory()
    {
        return Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0, 'parent_id' => 0])->get();
    }

    public function getChildCategories($id)
    {
        return Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0, 'parent_id' => $id])->get();
    }

    public function getFirstCategory()
    {
        return Category::where(['isDelete' => 0, 'active' => 1, 'type' => 1])->first();
    }

    public function create($request): bool
    {

        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            } else {
                $path_image = '/storage/default/image-available.jpg';
            }

            // Check type category
            $type = in_array((int)$request->type, [0, 1]) ? (int)$request->type : 0;
            Category::create([
                "name" => (string)$request->name,
                "meta_title" => (string)$request->meta_title,
                "slug" => (string)$request->slug,
                "parent_id" => (int)$request->cate_parent,
                "keyword" => (string)$request->keyword,
                "icon" => (string)$request->icon ?? 'fas fa-bars',
                "description" => (string)$request->description,
                "image" => $path_image,
                "type" => $type,
                "sort_home" => (int)$request->s_home,
                "sort_menu" => (int)$request->s_menu,
                "active" => (int)$request->active,
                "top" => (int)$request->top,
            ]);

            Session::flash('success', 'Tạo danh mục thành công.');
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slug = $request->input('slug');

        $category = Category::where('slug', $slug)->first();
        // get product of category

        $product = $this->productService->getProductByIdOfCategory($category->id);

        if ($product->count() > 0){
            return 0;
        }
        if ($category) {
            return Category::where('slug', $slug)->orWhere('parent_id', $category->id)->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($cate, $request): bool
    {
        try {

            // Nếu id category khác request input parent_id => update parent_id
            if ($cate->id != $request->input('cate_parent')) {
                $cate->parent_id = (int)$request->input('cate_parent');
            }

            if ($request->hasFile('image')) {
                $cate->image = $this->upload->store($request->file('image'));
            }

            $cate->name = (string)$request->input('name');
            $cate->meta_title = (string)$request->input('meta_title');
            $cate->slug = (string)$request->input('slug');
            $cate->keyword = (string)$request->input('keyword');
            $cate->icon = (string)$request->input('icon') ?? 'fas fa-bars';
            $cate->description = (string)$request->input('description');
            $cate->active = (int)$request->input('active');
            $cate->top = (int)$request->top;
            $cate->save();
            Session::flash('success', 'Cập nhật danh mục thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

    public function getDetailById($id)
    {
        return Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0, 'id' => $id])->firstOrFail();
    }

}

<?php


namespace App\Services\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Services\UploadService;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BrandService
{

    protected $upload;
    protected $productService;

    public function __construct(UploadService $upload, ProductService $productService)
    {
        $this->upload = $upload;
        $this->productService = $productService;
    }

    public function get($active = 0)
    {
        if ($active === 0) {
            return Brand::where('isDelete', 0)->get();
        }
        return Brand::latest()->where(['isDelete' => 0, 'active' => $active])->get();
    }

    public function create($request): bool
    {
        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            } else {
                $path_image = '/storage/default/image-available.jpg';
            }

            Brand::create([
                "name" => (string)$request->input('name'),
                "meta_title" => (string)$request->input('meta_title'),
                "image" => $path_image,
                "description" => (string)$request->input('description'),
                "slug" => (string)$request->input('slug'),
                "active" => (int)$request->input('active'),
            ]);

            Session::flash('success', 'Tạo thương hiệu thành công.');

        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function destroy($request)
    {
        $slug = $request->input('slug');

        $brand = Brand::where(['slug' => $slug, 'isDelete' => 0])->first();

        // get brand of product
        $product = $this->productService->getProductByBrand($brand->id);

        if ($product->count() > 0){
            return 0;
        }

        if ($brand) {
            return Brand::where(['slug' => $slug, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($brand, $brandRequest): bool
    {
        try {
            $path_image = $brand->image;

            if ($brandRequest->hasFile('image')) {
                $path_image = $this->upload->store($brandRequest->file('image'));
            }

            $brand->name = (string)$brandRequest->input('name');
            $brand->meta_title = (string)$brandRequest->input('meta_title');
            $brand->image = $path_image;
            $brand->description = (string)$brandRequest->input('description');
            $brand->slug = (string)$brandRequest->input('slug');
            $brand->active = (int)$brandRequest->input('active');
            $brand->save();
            Session::flash('success', 'Cập nhật thương hiệu thành công.');
            return true;
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

    public function getBrandsWithCategory(): Collection
    {
        // SELECT p.category_id, b.id, b.name, b.slug, b.image  FROM products p
        // INNER JOIN brands b ON p.brand_id = b.id WHERE b.isDelete = 0 AND b.active = 1
        // GROUP BY p.category_id, b.id, b.name, b.slug, b.image
        return DB::table('products')
            ->select('products.category_id', 'brands.id', 'brands.slug', 'brands.image', 'brands.name')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where(['brands.isDelete' => 0, 'brands.active' => 1])
            ->groupBy('products.category_id', 'brands.id', 'brands.name', 'brands.slug', 'brands.image')
            ->get();
    }

    public function getProductByBrand($id): LengthAwarePaginator
    {
        return Product::with(['brand' => function ($query) {
            $query->where(['isDelete' => 0, 'active' => 1]);
        }, 'attributes' => function ($query) {
            $query->where('isDelete', 0);
        }])->where(['isDelete' => 0, 'active' => 1, 'brand_id' => $id])->paginate(8);
    }

    public function getAllBrandWithOutSlug($id)
    {
        return Brand::latest()->where(['isDelete' => 0, 'active' => 1])->get();
    }

    public function getDetailByID($id)
    {
        return Brand::where(['isDelete' => 0, 'active' => 1, 'id' => $id])->firstOrFail();
    }

    public function getBrandKeyIsIdProduct(): array
    {
        $brands = $this->get(1);

        $brand_of_product = [];

        foreach ($brands as $brand) {
            $brand_of_product[$brand->id] = $brand;
        }

        return $brand_of_product;
    }
}

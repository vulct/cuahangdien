<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;
    protected $categoryService;
    protected $brandService;

    public function __construct(ProductService $productService, CategoryService $categoryService, BrandService $brandService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        return view('admin.products.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Thêm mới sản phẩm',
            'categories' => $this->categoryService->get(1),
            'brands' => $this->brandService->get(1)
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        if ($this->productService->create($request)) {
            return redirect()->route('admin.products.index');
        }
        return back()->withInput();
    }

    public function show(Product $product)
    {
        return view('admin.products.detail', [
            'brands' => $this->brandService->get(1),
            'categories' => $this->categoryService->get(1),
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Chỉnh sửa thông tin sản phẩm',
            'categories' => $this->categoryService->get(1),
            'brands' => $this->brandService->get(1),
            'product' => $this->productService->getProductIsActive($product->id)
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect()->route('admin.products.index');
        }
        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->productService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa sản phẩm thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}

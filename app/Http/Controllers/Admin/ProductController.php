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
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

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

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.products.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Thêm mới sản phẩm',
            'categories' => $this->categoryService->get(1),
            'brands' => $this->brandService->get(1)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        if ($this->productService->create($request)) {
            return redirect()->route('admin.products.index');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        return view('admin.products.detail', [
            'brands' => $this->brandService->get(1),
            'categories' => $this->categoryService->get(1),
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Chỉnh sửa thông tin sản phẩm',
            'categories' => $this->categoryService->get(1),
            'brands' => $this->brandService->get(1),
            'product' => $this->productService->getProductIsActive($product->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect()->route('admin.products.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
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

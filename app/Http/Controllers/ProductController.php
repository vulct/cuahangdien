<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\PageService;
use App\Services\Admin\ProductService;
use App\Services\TariffService;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    protected $productService;
    protected $brandService;
    protected $categoryService;
    protected $pageService;
    protected $tariffService;

    public function __construct(ProductService $productService, CategoryService $categoryService,
                                BrandService   $brandService, PageService $pageService, TariffService $tariffService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
        $this->pageService = $pageService;
        $this->tariffService = $tariffService;
    }

    public function index()
    {
        return view('guest.products.index', [
            'title' => 'Thiết Bị Điện & Vật Tư Ngành Nước',
            'brands' => $this->brandService->get(1),
            'categories' => $this->categoryService->getParentCategory()
        ]);
    }

    public function getProductByBrandAndCategory(Brand $brand, Category $category)
    {
        $title = $category->name . ' ' . $brand->name;

        $products = $this->productService->getProductByBrandAndCategory($brand->id, $category->id);

        $categories_current = $this->categoryService->get(1);

        $categories_without_category = $this->productService->getCategoriesWithBrandWithoutCategory($brand->id, $category->id);

        $count = [];

        $cate_brand = [];

        foreach ($categories_current as $category_current) {
            foreach ($categories_without_category as $cate) {
                if ($category_current->id === $cate->category_id) {
                    $cate_brand[] = $category_current;
                    isset($count[$category_current->id]) ? $count[$category_current->id]++ : $count[$category_current->id] = 1;
                }
            }
        }

        foreach ($categories_current as $cate) {
            foreach ($count as $key => $c) {
                if ($cate->id == $key && $cate->parent_id !== 0 && isset($count[$cate->parent_id])) {
                    $count[$cate->parent_id] += $c;
                }
            }
        }

        return view('guest.products.brand-category', [
            'title' => $title,
            'products' => $products,
            'categoryOfBrand' => $cate_brand,
            'count' => $count,
            'brand' => $brand,
            'category' => $category
        ]);
    }

    public function getProductByCategory(Category $category)
    {
        $title = !isEmpty($category->meta_title) ? $category->meta_title : $category->name;

        $brands = $this->brandService->get(1);

        $brand_of_product = [];
        foreach ($brands as $brand) {
            $brand_of_product[$brand->id] = $brand;
        }

        $products = $this->productService->getProductByCategory($category->id, 5);

        $brand_with_category = $this->brandService->getBrandsWithCategory();

        $get_categories_child = $this->categoryService->getChildCategories($category->id);

        return view('guest.products.category', [
            'title' => $title,
            'products' => $products,
            'category' => $category,
            'list_brand' => $brand_with_category,
            'categories_child' => $get_categories_child,
            'brands' => $brand_of_product
        ]);
    }

    public function getProductDiscount()
    {
        $products = $this->productService->getProductDiscount();

        $brand_of_product = $this->brandService->getBrandKeyIsIdProduct();

        $product_is_discount = [];

        foreach ($products as $product) {
            foreach ($product->attributes as $attribute) {
                if ($attribute->discount >= 40) {
                    if (!key_exists($product->id,$product_is_discount)){
                        $product_is_discount[$product->id] = $product;
                    }
                }
            }
        }


        return view('guest.products.discount', [
            'title' => 'Sản phẩm khuyến mãi - Ưu đãi cao',
            'products' => $product_is_discount,
            'brands' => $brand_of_product
        ]);
    }

    public function detail(Product $product)
    {
        $product_detail = $this->productService->getDetailProduct($product->id);

        //bảng giá mới của hãng ( product->brand_id )
        $tariff = $this->tariffService->getFirstTariff($product->brand_id);

        // các sản phẩm có cùng thư mục
        $products_in_category = $this->productService->getProductByCategory($product_detail->category_id, 5);

        //get page: hướng dẫn mua hàng + bảo hành & đổi trả
        // 0 - về chúng tôi, 1 - tuyển dụng, 2 - hướng dẫn mua hàng
        // 3 - thanh toán vận chuyển, 4 - bảo hành đổi trả,
        // 5 - chính sách bảo mật

        $page = [];

        $page['buy_product'] = $this->pageService->getPageWithType(2);

        $page['warranty'] = $this->pageService->getPageWithType(4);


        return view('guest.products.detail', [
            'title' => !isEmpty($product_detail->meta_title) ? $product_detail->meta_title : $product_detail->name,
            'product' => $product_detail,
            'page' => $page,
            'tariff' => $tariff,
            'products_in_category' => $products_in_category,
            'brands' => $this->brandService->getBrandKeyIsIdProduct()
        ]);
    }

}

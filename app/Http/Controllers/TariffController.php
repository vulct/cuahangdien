<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffRequest;
use App\Models\Brand;
use App\Models\Tariff;
use App\Services\Admin\BrandService;
use App\Services\TariffService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class TariffController extends Controller
{
    protected $tariffService;
    protected $brandService;

    public function __construct(TariffService $tariffService, BrandService $brandService)
    {
        $this->tariffService = $tariffService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        return view('admin.tariff.list', [
            'title' => 'Danh sách bảng giá',
            'tariffs' => $this->tariffService->get()
        ]);
    }

    public function create()
    {
        return view('admin.tariff.add', [
            'title' => 'Thêm mới bảng giá',
            'brands' => $this->brandService->get(1)
        ]);
    }

    public function store(TariffRequest $request): RedirectResponse
    {
        $this->tariffService->create($request);
        return redirect()->route('admin.tariffs.index');
    }

    public function edit(Tariff $tariff)
    {
        return view('admin.tariff.edit', [
            'title' => 'Chỉnh sửa bảng giá',
            'brands' => $this->brandService->get(1),
            'tariff' => $tariff
        ]);
    }

    public function update(TariffRequest $request, Tariff $tariff): RedirectResponse
    {
        $result = $this->tariffService->update($tariff, $request);

        if ($result) {
            return redirect()->route('admin.tariffs.index');
        }

        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->tariffService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa báo giá thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function countTariffOfBrand(): array
    {
        $tariffs = $this->tariffService->getAll();

        $brands = $this->brandService->get(1);

        $list_brands_of_tariff = [];
        $count_of_brand = [];

        foreach ($brands as $brand){
            foreach ($tariffs as $tariff){
                if ($tariff->brand_id === $brand->id){
                    $list_brands_of_tariff[$brand->id] = $brand;
                    isset($count_of_brand[$brand->id]) ? $count_of_brand[$brand->id]++ : $count_of_brand[$brand->id] = 1;
                }
            }
        }

        return array([
            'list_brands_of_tariff' => $list_brands_of_tariff,
            'count_of_brand' => $count_of_brand
        ]);
    }

    public function getAll()
    {
        $list_brands_of_tariff = $this->countTariffOfBrand()[0]['list_brands_of_tariff'];

        $count_of_brand = $this->countTariffOfBrand()[0]['count_of_brand'];

        return view('guest.tariffs.index', [
            'title' => 'Bảng giá ' . date("Y"),
            'brands' => $list_brands_of_tariff,
            'count_of_brand' => $count_of_brand,
            'tariffs' => $this->tariffService->getAllWithPaginate()
        ]);
    }

    public function getTariffWithBrand(Brand $brand)
    {

        $title = !isEmpty($brand->meta_title) ? $brand->meta_title : $brand->name;

        $list_brands_of_tariff = $this->countTariffOfBrand()[0]['list_brands_of_tariff'];

        $count_of_brand = $this->countTariffOfBrand()[0]['count_of_brand'];

        return view('guest.tariffs.brand', [
            'title' => $title,
            'brands' => $list_brands_of_tariff,
            'brand_selected' => $brand,
            'count_of_brand' => $count_of_brand,
            'tariffs' => $this->tariffService->getAllWithPaginate($brand->id)
        ]);
    }

    public function getDetailTariff(Tariff $tariff)
    {

        $tariff_detail = $this->tariffService->getDetail($tariff->id);

        $title = !isEmpty($tariff_detail->meta_title) ? $tariff_detail->meta_title : $tariff_detail->name;

        $list_brands_of_tariff = $this->countTariffOfBrand()[0]['list_brands_of_tariff'];

        $count_of_brand = $this->countTariffOfBrand()[0]['count_of_brand'];

        $brand_selected = $this->brandService->getDetailByID($tariff->brand_id);

        return view('guest.tariffs.detail', [
            'title' => $title,
            'count_of_brand' => $count_of_brand,
            'brands' => $list_brands_of_tariff,
            'tariff' => $tariff_detail,
            'brand_selected' => $brand_selected
        ]);
    }
}

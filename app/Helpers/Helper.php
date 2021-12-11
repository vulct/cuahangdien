<?php

namespace App\Helpers;

class Helper
{
    // show category with table
    public static function category($categories, $parent_id = 0, $char = '', $category_parent = []): string
    {
        $html = '';

        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {
                $name_parent = "ROOT";
                if ($category->parent_id !== 0 && isset($category_parent->name)){
                    $name_parent = $category_parent->name;
                }
                $image = $category->image;
                $slug = $category->slug;
                $html .= '
                    <tr>
                        <td>' . $category->id . '</td>
                        <td>
                        <img src="'.$image.'" class="img-circle img-size-50 mr-2" style="min-height: 50px;" alt="Hình thu nhỏ" />
                        </td>
                        <td>' . $char . ' ' . $category->name . '</td>
                        <td>'. $name_parent .'</td>
                        <td>' . self::show($category->top) . '</td>
                        <td>' . self::active($category->active) . '</td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-show" data-url="'. route('admin.categories.show', $category->slug) .'" data-toggle="modal" data-target="#show"><i class="fas fa-eye"></i></button>
                            <a class="btn btn-info btn-sm btn-edit" href="'. route('admin.categories.edit', $category->slug) .'"><i class="fas fa-pencil-alt"></i></a>
                            <button class="btn btn-danger btn-sm btn-delete" data-url="categories/destroy" onclick="'.'removeFunction(\''.$slug.'\')"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                ';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char . '|--', $category);
            }
        }
        return $html;
    }

    // show category of post
    public static function category_post($categories, $parent_id = 0, $char = '', $category_parent = []): string
    {
        $html = '';

        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {
                $name_parent = "ROOT";
                if ($category->parent_id !== 0 && isset($category_parent->name)){
                    $name_parent = $category_parent->name;
                }
                $image = $category->image;
                $slug = $category->slug;
                $html .= '
                    <tr>
                        <td>' . $category->id . '</td>
                        <td>
                        <img src="'.$image.'" class="img-circle img-size-50 mr-2" style="min-height: 50px;" alt="Hình thu nhỏ" />
                        </td>
                        <td>' . $char . ' ' . $category->name . '</td>
                        <td>'. $name_parent .'</td>
                        <td>' . self::show($category->top) . '</td>
                        <td>' . self::active($category->active) . '</td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-show" data-url="'. route('admin.categories_post.show', $category->slug) .'" data-toggle="modal" data-target="#show"><i class="fas fa-eye"></i></button>
                            <a class="btn btn-info btn-sm btn-edit" href="'. route('admin.categories_post.edit', $category->slug) .'"><i class="fas fa-pencil-alt"></i></a>
                            <button class="btn btn-danger btn-sm btn-delete" data-url="categories_post/destroy" onclick="'.'removeFunction(\''.$slug.'\')"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                ';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char . '|--', $category);
            }
        }
        return $html;
    }


    // show category with option
    public static function categoryOption($categories, $parent_id = 0, $char = '', $selected = 0): string
    {
        $option = '';

        foreach ($categories as $key => $category) {

            if ($category->parent_id == $parent_id) {
                $se = $selected == $category->id ? "selected" : "";
                $option .= '
                    <option value="'.$category->id.'" '.$se.'>' . $char . ' ' . $category->name . '</option>
                ';

                unset($categories[$key]);

                $option .= self::categoryOption($categories, $category->id, $char . '|--', $selected);
            }
        }
        return $option;
    }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="d-block badge bg-danger p-2">Không hoạt động</span>'
            : '<span class="d-block badge bg-success p-2">Hoạt động</span>';
    }

    public static function show($top = 0): string
    {
        return $top == 0 ? '<span class="d-block badge bg-danger p-2">Không hiển thị</span>'
            : '<span class="d-block badge bg-success p-2">Hiển thị</span>';
    }

    public static function view($active = 0): string
    {
        return $active == 0 ? '<span class="d-block badge bg-success p-2">Đã xem</span>'
            : '<span class="d-block badge bg-danger p-2">Chưa xem</span>';
    }

    // get url banner with sort
    public static function bannerWithSort($banners, $sort)
    {
        foreach ($banners as $banner){
            if ($banner->sort === $sort){
                return $banner;
            }
        }

        return false;
    }

    // get name type of page
    public static function getNameTypeOfPage($type): string
    {
        //0 - về chúng tôi, 1 - tuyển dụng, 2 - hướng dẫn mua hàng
        // 3 - thanh toán vận chuyển, 4 - bảo hành đổi trả,
        // 5 - chính sách bảo mật
        switch ($type){
            case 0 : return 'Về chúng tôi';
            case 1 : return 'Tuyển dụng';
            case 2 : return 'Hướng dẫn mua hàng';
            case 3 : return 'Thanh toán vận chuyển';
            case 4 : return 'Bảo hành đổi trả';
            case 5 : return 'Chính sách bảo mật';
            default: return 'Không tồn tại';
        }
    }

    public static function getDateTime($datetime)
    {
        $timeEng = ['Sun','Mon','Tue','Wed', 'Thu', 'Fri', 'Sat', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $timeVie = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy','Một', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy', 'Tám', 'Chín', 'Mười', 'Mười Một', 'Mười Hai'];
        $time = strtotime($datetime);
        $time = date('d \T\h\á\n\g M Y',$time);
        return str_replace( $timeEng, $timeVie, $time);
    }

    //get price in add-cart
    public static function price($price = 0, $discount = 0, $qty = 1): string
    {
        if ($discount > 0) return number_format(($price - $price * $discount/100)*$qty);
        if ($price != 0)  return number_format($price*$qty);
        return 0;
    }

    // get status order
    public static function statusBillShowInAdmin($status = 0): string
    {

        switch ($status){
            case 1:
                $html = '<span class="d-block badge bg-secondary p-2">Đang báo giá</span>';
                break;
            case 2:
                $html = '<span class="d-block badge bg-info p-2">Đã báo giá</span>';
                break;
            case 3:
                $html = '<span class="d-block badge bg-primary p-2">Đang giao hàng</span>';
                break;
            case 4:
                $html = '<span class="d-block badge bg-success p-2">Đã thanh toán</span>';
                break;
            case 5:
                $html = '<span class="d-block badge bg-info p-2">Chưa thanh toán</span>';
                break;
            case 6:
                $html = '<span class="d-block badge bg-success p-2">Thành công</span>';
                break;
            case 7:
                $html = '<span class="d-block badge bg-danger p-2">Huỷ</span>';
                break;
            case 0:
            default:
                $html = '<span class="d-block badge bg-warning p-2">Đang xử lý</span>';
                break;
        }

        return $html;
    }

    public static function statusOrder($status = 0): string
    {
        switch ($status){
            case 1:
                $html = '<span class="label label-warning">Đang báo giá</span>';
                break;
            case 2:
                $html = '<span class="label label-info">Đã báo giá</span>';
                break;
            case 3:
                $html = '<span class="label label-primary">Đang giao hàng</span>';
                break;
            case 4:
                $html = '<span class="label label-success">Đã thanh toán</span>';
                break;
            case 5:
                $html = '<span class="label label-info">Chưa thanh toán</span>';
                break;
            case 6:
                $html = '<span class="label label-success">Thành công</span>';
                break;
            case 7:
                $html = '<span class="label label-danger">Huỷ</span>';
                break;
            case 0:
            default:
                $html = '<span class="label label-default">Đang xử lý</span>';
                break;
        }

        return $html;
    }

    public static function getStatusBillInDashboard($status = 0): string
    {
        switch ($status){
            case 1:
                $html = '<span class="badge badge-light">Đang báo giá</span>';
                break;
            case 2:
                $html = '<span class="badge badge-info">Đã báo giá</span>';
                break;
            case 3:
                $html = '<span class="badge badge-primary">Đang giao hàng</span>';
                break;
            case 4:
                $html = '<span class="badge badge-success">Đã thanh toán</span>';
                break;
            case 5:
                $html = '<span class="badge badge-info">Chưa thanh toán</span>';
                break;
            case 6:
                $html = '<span class="badge badge-success">Thành công</span>';
                break;
            case 7:
                $html = '<span class="badge badge-danger">Huỷ</span>';
                break;
            case 0:
            default:
                $html = '<span class="badge badge-warning">Đang xử lý</span>';
                break;
        }

        return $html;
    }

    public static function obfuscate_email($email): string
    {
        $em   = explode("@",$email);
        $name = implode('@', array_slice($em, 0, count($em)-1));
        $len  = floor(strlen($name)/2);
        return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);
    }

    public static function hiddenPhoneNumber($phone = "")
    {
        $phone_clear = preg_replace("/[^0-9]/", "", (string)$phone);
        return preg_replace("/\\d(?=\\d{4})/","*",$phone_clear);
    }

    public static function getFullAddress($address, $province, $city): string
    {
        // read file json
        // get city
        $city_list = file_get_contents(public_path('json/tinh_tp.json'));
        $city_decode = json_decode($city_list, true);
        // get province
        $province_list = file_get_contents(public_path('json/quan_huyen.json'));
        $province_decode = json_decode($province_list, true);
        $province_string = "";
        $city_string = "";

        foreach ($province_decode as $key => $item){
            if ($province == (int)$key){
                $province_string = $item['name_with_type'];
            }
        }
        foreach ($city_decode as $code => $city_item){
            if ($city == (int)$code){
                $city_string = $city_item['name_with_type'];
            }
        }
        return $address . ', ' . $province_string . ', ' . $city_string;
    }
}

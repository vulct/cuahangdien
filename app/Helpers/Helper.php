<?php

namespace App\Helpers;

class Helper
{
    public static function category($categories, $parent_id = 0, $char = ''): string
    {
        $html = "";

        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {

                $html .= '
                    <tr>
                        <td>' . $category->id . '</td>
                        <td style="width: auto;height: auto;max-width: 40px;max-height: 40px;vertical-align: middle;">
                        ' . $category->image . '
                        </td>
                        <td>' . $char . ' ' . $category->name . '</td>
                        <td>' . $category->slug . '</td>
                        <td>' . $category->updated_at . '</td>
                        <td>' . self::active($category->active) . '</td>
                        <td>' . self::showHome($category->showHome) . '</td>
                        <td>
                            <a class="btn btn-primary waves-effect waves-light" href="'. route('admin.categories.edit', $category->slug) .'"><i class="ti-pencil-alt"></i></a>
                        </td>
                    </tr>
                ';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char . '|--');
            }
        }
//        <button class="btn btn-danger waves-effect waves-light" href="#" onclick="removeCategory(' . $category->id . ')"><i class="ti-trash"></i></button>
        return $html;
    }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<h5 class="d-block badge bg-danger p-2">Không hoạt động</h5>'
            : '<h5 class="d-block badge bg-success p-2">Hoạt động</h5>';
    }

    public static function showHome($show = 0): string
    {
        return $show == 0 ? '<h5 class="d-block badge bg-danger p-2">Ẩn</h5>'
            : '<h5 class="d-block badge bg-success p-2">Hiển thị</h5>';
    }
}

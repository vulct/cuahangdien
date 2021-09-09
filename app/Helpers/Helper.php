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
                        <td>' . $category->description . '</td>
                        <td>' . $category->slug . '</td>
                        <td>' . $category->updated_at . '</td>
                        <td>' . self::active($category->active) . '</td>
                        <td>' . self::showHome($category->showHome) . '</td>
                        <td style="min-width: 195px">
                            <button class="btn btn-primary btn-sm btn-show" data-url="'. route('admin.categories.show', $category->slug) .'" data-toggle="modal" data-target="#show"><i class="fas fa-folder"></i> Detail</button>
                            <button class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <button class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</button>
                        </td>
                    </tr>
                ';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char . '|--');
            }
        }
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

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
                        <td>
                        <img src="'.$category->image.'" class="img-circle img-size-32 mr-2" style="min-height: 32px;">
                        </td>
                        <td>' . $char . ' ' . $category->name . '</td>
                        <td>' . $category->slug . '</td>
                        <td>' . $category->updated_at . '</td>
                        <td>' . self::active($category->active) . '</td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-show" data-url="'. route('admin.categories.show', $category->slug) .'" data-toggle="modal" data-target="#show"><i class="fas fa-eye"></i></button>
                            <a class="btn btn-info btn-sm btn-edit" href="'. route('admin.categories.edit', $category->slug) .'"><i class="fas fa-pencil-alt"></i></a>
                            <button class="btn btn-danger btn-sm btn-delete" data-url="'.$category->slug.'"><i class="fas fa-trash"></i></button>
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
        return $active == 0 ? '<span class="d-block badge bg-danger p-2">Không hoạt động</span>'
            : '<span class="d-block badge bg-success p-2">Hoạt động</span>';
    }
}

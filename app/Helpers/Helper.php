<?php

namespace App\Helpers;

use App\Models\Category;

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
                $image = !empty($category->image) ? $category->image : config('app.url').'/storage/uploads/default/no-image.jpg' ;
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
}

<?php

namespace App\Http\Controllers;

class SearchController
{
    public function index()
    {
        return view('admin.search.index', [
            'title' => 'Kết quả tìm kiếm: '
        ]);
    }

}

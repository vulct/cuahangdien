<?php

namespace App\Services;

use App\Helpers\Helper;

class UploadService
{
    public function store($request)
    {
        try{
            $name = $request->getClientOriginalName();
            $cleanName = Helper::cleanString($name);
            $fullPath = 'uploads/' . date("Y/m/d");
            $path = $request->storeAs(
                'public/'. $fullPath, $cleanName
            );
            return '/storage/' . $fullPath . '/' . $cleanName;
        }catch (\Exception $exception){
            return false;
        }
    }

//    public function uploadMultiple ($request)
//    {
//
//    }
}

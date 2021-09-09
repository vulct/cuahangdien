<?php

namespace App\Services;

class UploadService
{
    public function store($request)
    {
        try{
            $name = $request->getClientOriginalName();

            $fullPath = 'uploads/' . date("Y/m/d");
            $path = $request->storeAs(
                'public/'. $fullPath, $name
            );
            return '/storage/' . $fullPath . '/' . $name;
        }catch (\Exception $exception){
            return false;
        }
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Contact;
use App\Services\UploadService;
use Illuminate\Support\Facades\Session;

class GroupService
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Contact::latest('id')->where('isDelete', 0)->get();
    }

    public function create($request)
    {
        try {

            $count = count($this->get());

            if ($count < 4){
                if ($request->hasFile('image')) {
                    $path_image = $this->upload->store($request->file('image'));
                }else{
                    $path_image = '/storage/default/image-available.jpg';
                }

                Contact::create([
                    "name" => (string)$request->input('name'),
                    "image" => $path_image,
                    "phone" => (string)$request->input('phone'),
                    "type" => (int)$request->input('type'),
                    "active" => (int)$request->input('active'),
                ]);

                Session::flash('success', 'Tạo nhân viên thành công.');
            }else{
                Session::flash('error', 'Tạo nhân viên không thành công, số lượng đã đạt tối đa');
                return false;
            }



        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;

    }

    public function update($contact, $request)
    {
        try {
            $path_image = $contact->image;

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            }

            $contact->name = (string)$request->input('name');
            $contact->image = $path_image;
            $contact->phone = (string)$request->input('phone');
            $contact->type = (string)$request->input('type');
            $contact->active = (int)$request->input('active');
            $contact->save();
            Session::flash('success', 'Cập nhật nhân viên thành công.');
            return true;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

}

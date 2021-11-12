<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Contact;
use App\Services\Admin\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }


    public function index()
    {
        return view('admin.groups.list', [
            'title' => 'Danh sách nhân viên liên hệ',
            'contacts' => $this->groupService->get()
        ]);
    }

    public function create()
    {
        return view('admin.groups.add', [
            'title' => 'Thêm mới nhân viên'
        ]);
    }

    public function store(ContactRequest $request)
    {
        $this->groupService->create($request);
        return redirect()->route('admin.groups.index');
    }

    public function edit(Contact $contact)
    {
        return view('admin.groups.edit', [
            'title' => 'Chỉnh sửa thông tin nhân viên',
            'staff' => $contact
        ]);
    }

    public function update(Contact $contact, ContactRequest $groupRequest)
    {
        $result = $this->groupService->update($contact, $groupRequest);
        if ($result) {
            return redirect()->route('admin.groups.index');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $result = $this->groupService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa nhân viên thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}

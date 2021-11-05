<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin.account.index', [
            'title' => 'Tài khoản quản trị'
        ]);
    }

    public function update(): RedirectResponse
    {
        $userprofile = Auth::user();

        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$userprofile->id,
            'password' => 'required|string',
        ]);



        $userprofile->update([
            'name' => trim(strip_tags(request('name'))),
            'email' => request('email')
        ]);

        if (!Hash::check(request('password'), $userprofile->password)) {
            Session::flash('error', 'Mật khẩu cung cấp không đúng, vui lòng kiểm tra lại' );
            return back();
        }

        Session::flash('success', 'Cập nhật thông tin tài khoản quản trị thành công!' );
        return back();
    }

    public function change(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            Session::flash('error', 'Mật khẩu cũ không đúng, vui lòng kiểm tra lại.' );
            return back();
        }

        $user->password = Hash::make($request->password);

        $user->save();

        Session::flash('success', 'Thay đổi mật khẩu thành công!' );
        return back();
    }

}

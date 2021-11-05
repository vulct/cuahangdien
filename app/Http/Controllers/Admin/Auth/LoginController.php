<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.auth.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|string|email:filter',
            'password' => 'required|string'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember_me = !empty($request->remember);

        if (Auth::attempt($credential)) {
            $user = User::where(['email' => $credential['email']])->first();

            Auth::login($user, $remember_me);
            return response()->json(['message' => 'Đăng nhập thành công, vui lòng chờ chuyển hướng về trang quản trị.'], 200);
        }

        return response()->json(['message' => 'Đăng nhập không thành công, vui lòng kiểm tra lại thông tin.'], 401);
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

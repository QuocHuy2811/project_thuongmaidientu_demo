<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra session 'user' tồn tại và role là 'admin'
        $user = Session::get('user');
        if (!$user || $user['role'] !== 'admin') {
            // Chặn tuyệt đối: Redirect về đăng nhập với message lỗi
            return Redirect::route('dangnhap')->with('error', 'Bạn cần đăng nhập với quyền admin để truy cập trang này.');
        }

        // Lưu user vào request nếu cần dùng trong controller
        $request->merge(['user' => $user]);

        return $next($request);
    }
}
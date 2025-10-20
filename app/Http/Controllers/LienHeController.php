<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Lấy dữ liệu cũ từ request để giữ lại trên form
        $email = $request->input('exampleInputEmail1');
        $sdt = $request->input('exampleInputSDT');
        $tieuDe = $request->input('exampleInputTieuDe');
        $noidung = $request->input('exampleInputNoidung');

        // Trả về view với dữ liệu cũ
        return view('contact', compact('email', 'sdt', 'tieuDe', 'noidung'));
    }
}
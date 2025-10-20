<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminhome');
    }
    public function themSanPham(){
        $danhMucs = DanhMuc::where('trangThai', 'active')->get();  // Query DB
        return view('admin.themsanpham', compact('danhMucs'));  // Truyền biến
    }
    public function blankPage(){
        return view('admin.blankpageadmin');
    }

    public function storeSanPham(Request $request)  // Method xử lý POST (đã có route)
    {
        // Validate và lưu dữ liệu (thêm validation cho maDanhMuc nếu cần)
        $request->validate([
            'maSanPham' => 'required|string|max:50|unique:SanPham,maSP', // bắt buộc chuỗi string, max 50 ký tự, unique in maSP
            'maDanhMuc' => 'required|string|exists:DanhMuc,maDanhMuc',  // Validate FK tồn tại
        ],[
            'maSanPham.unique' => 'Mã sản phẩm đã tồn tại, vui lòng nhập mã khác!'  // Custom message
        ]);
        $hinhAnhFiles = $request->file('hinhAnh');
        if (empty($hinhAnhFiles)) {
            return back()->withErrors(['hinhAnh' => 'Vui lòng chọn ảnh!']);
        }

        // Lưu ảnh chính (file đầu tiên) với tên gốc
        $hinhAnhChinhFile = $hinhAnhFiles[0];
        $tenFileGoc = $hinhAnhChinhFile->getClientOriginalName();  // Lấy tên gốc: "iphone.jpg"
        $hinhAnhChinhFile->storeAs('img', $tenFileGoc, 'public');
        // Lưu tên file vào DB
        $tenFile = $hinhAnhChinhFile->getClientOriginalName();
        // $tenAnhThem = [];  // Nếu có field riêng cho ảnh thêm
        // for ($i = 1; $i < count($hinhAnhFiles); $i++) {
        //     $fileThem = $hinhAnhFiles[$i];
        //     $tenFileThem = $fileThem->getClientOriginalName();
        //     $fileThem->storeAs('sanpham', $tenFileThem, 'public');
        //     $tenAnhThem[] = $tenFileThem;  // Có thể lưu JSON nếu cần
        // }
        // Map dữ liệu từ request sang tên field DB
        $data = [
            'maSP' => $request->maSanPham,
            'tenSP' => $request->tenSanPham,
            'giaTien' => $request->giaSanPham,
            'moTa' => $request->moTaSanPham,
            'soLuongTon' => $request->soLuongTon,
            'hinhAnh' => $tenFile,
            'trangThai' => $request->trangThai,
            'maDanhMuc' => $request->maDanhMuc,
            'mauSac' => $request->mauSanPham,
            'dungLuong' => $request->dungLuong,
            'ram' => $request->ram,
            'chip' => $request->chip,
            'tanSoHz' => $request->hz,
        ];

        // Lưu vào DB
        SanPham::create($data);

        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'SanPham';
    protected $primaryKey = 'maSP';
    public $incrementing = false; // Since maSP is not auto-incrementing
    protected $keyType = 'string'; // Since maSP is VARCHAR
    public $timestamps = false;
    protected $fillable = [
        'maSP', 'tenSP', 'giaTien', 'moTa', 'soLuongTon', 'hinhAnh',
        'trangThai', 'maDanhMuc', 'mauSac', 'dungLuong', 'ram', 'chip', 'tanSoHz'
    ];

}
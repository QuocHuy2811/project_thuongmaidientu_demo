<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{

    protected $table = 'NguoiDung';  // Tên bảng
    protected $primaryKey = 'maNguoiDung';  // Primary key
    public $incrementing = false;  // Không auto-increment
    protected $keyType = 'string';  // Kiểu string cho PK

    protected $fillable = [
        'maNguoiDung', 'hoTenNguoiDung', 'sdt', 'email', 'gioiTinh',
        'diaChi', 'ngaySinh', 'matKhau', 'role'
    ];
}
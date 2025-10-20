<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'DanhMuc';
    protected $primaryKey = 'maDanhMuc';  // Primary key tùy chỉnh
    public $incrementing = false;  // Không auto-increment
    protected $keyType = 'string';  // Key là string (VARCHAR)
    public $timestamps = false;
    protected $fillable = [
        'maDanhMuc',
        'tenDanhMuc',
        'trangThai',
    ];

    protected $casts = [
        'trangThai' => 'string',  // Cast để đảm bảo kiểu dữ liệu
    ];

    // Relationship: Một DanhMuc có nhiều SanPham
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'maDanhMuc', 'maDanhMuc');
    }

    // Scope tùy chọn: Để query danh mục active
    public function scopeActive($query)
    {
        return $query->where('trangThai', 'active');
    }
}
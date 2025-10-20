@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')

@section('css')
<style>
    .invalid-feedback {
        display: block;  /* Luôn show khi có lỗi */
        color: red;
        font-size: 0.875em;
    }
    div.container, #hinhAnh, #trangThai, #dungLuong, #additional-images, option {
        color: grey;
    }
    .image-input-group {
        position: relative;
    }
    .remove-image-btn {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
    }
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addBtn = document.getElementById('add-image-btn');
    const additionalContainer = document.getElementById('additional-images');
    let imageCounter = 1; // Đếm số input thêm

    if (addBtn && additionalContainer) {
        addBtn.addEventListener('click', function() {
            if (imageCounter >= 4) { // Giới hạn max 5 ảnh thêm (tùy chỉnh)
                alert('Tối đa 4 ảnh!');
                return;
            }
            
            // Tạo input mới
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'image-input-group mb-2';
            newInputGroup.innerHTML = `
                <input type="file" class="form-control" name="hinhAnh[]" accept="image/*">
                <small class="text-muted d-block">Ảnh thêm ${++imageCounter}</small>
                <button type="button" class="btn btn-danger btn-sm remove-image-btn mt-1">
                    <i class="fa fa-trash"></i> Xóa
                </button>
            `;
            
            // Append vào container riêng (nhóm khác)
            additionalContainer.appendChild(newInputGroup);
            
            // Event xóa
            const removeBtn = newInputGroup.querySelector('.remove-image-btn');
            removeBtn.addEventListener('click', function() {
                additionalContainer.removeChild(newInputGroup);
                imageCounter--;
            });
        });
        // THÊM: Auto-hide alerts sau 5 giây
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(function() {
                const alertInstance = new bootstrap.Alert(successAlert);
                alertInstance.close();
            }, 5000); // 5 giây
        }
    }
});
</script>
@endsection

@section('content')
{{-- THÊM: Phần hiển thị success/error message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<form action="{{ route('admin.themsanpham') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <p style="font-size: 50px;" class="text-center mb-3">Trang Thêm Sản Phẩm</p>
        <div class="row mt-4" style="margin-left: 15px;">
            <div class="col-md-3">
                <label for="maSanPham" class="form-label">Mã Sản Phẩm</label>
                <input type="text" class="form-control @error('maSanPham') is-invalid @enderror" id="maSanPham" name="maSanPham" value="{{ old('maSanPham') }}" required>
                {{-- Hiển thị lỗi nếu có --}}
                @error('maSanPham')
                    <div class="invalid-feedback">{{ $message }}</div>  <!-- Sẽ show: "Mã sản phẩm đã tồn tại." -->
                @enderror
            </div>
            <div class="col-md-3">
                <label for="tenSanPham" class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="tenSanPham" name="tenSanPham" value="{{ old('tenSanPham') }}" required>
            </div>
            <div class="col-md-3">
                <label for="giaSanPham" class="form-label">Giá Sản Phẩm</label>
                <input type="number" class="form-control" id="giaSanPham" name="giaSanPham" value="{{ old('giaSanPham') }}" min="0" required>
            </div>
            <div class="col-md-3">
                <label for="moTaSanPham" class="form-label">Mô Tả</label>
                <input type="text" class="form-control" id="moTaSanPham" name="moTaSanPham" value="{{ old('moTaSanPham') }}">
            </div>
        </div>
        <div class="row mt-4" style="margin-left: 15px;">
            <div class="col-md-3">
                <label for="hinhAnh" class="form-label">Ảnh Sản Phẩm</label>
                
                <!-- Container chính cho tất cả ảnh -->
                <div id="image-container">
                    <!-- Input ảnh đầu tiên (mặc định) -->
                    <div class="image-input-group mb-2">
                        <input type="file" class="form-control" id="hinhAnh" name="hinhAnh[]" accept="image/*" required>
                        <small class="text-muted d-block">Ảnh chính</small>
                    </div>
                    
                    <!-- Container riêng cho các ảnh thêm (nhóm khác, dễ xử lý) -->
                    <div id="additional-images" id="hinhAnh" class="additional-images"></div>
                </div>
                
                <!-- Button + để thêm input mới -->
                <button type="button" id="add-image-btn" class="btn btn-outline-primary btn-sm mt-2">
                    <i class="fa fa-plus"></i> Thêm ảnh
                </button>
            </div>
            <div class="col-md-3">
                <label for="soLuongTon" class="form-label">Số Lượng Tồn Kho</label>
                <input type="number" class="form-control" id="soLuongTon" name="soLuongTon" value="{{ old('soLuongTon') }}" min="0" required>
            </div>
            <div class="col-md-3">
                <label for="trangThai" class="form-label">Trạng Thái Sản Phẩm</label>
                <select class="form-select" id="trangThai" name="trangThai" required>
                    <option value="">Chọn trạng thái</option>
                    <option value="active" {{ old('trangThai') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('trangThai') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="out_of_stock" {{ old('trangThai') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="mauSanPham" class="form-label">Màu Sản Phẩm</label>
                <input type="text" class="form-control" id="mauSanPham" name="mauSanPham" value="{{ old('mauSanPham') }}">
            </div>
        </div>
        <div class="row mt-4" style="margin-left: 15px;">
            <div class="col-md-3">
                <label for="dungLuong" class="form-label">Dung Lượng</label>
                <select class="form-select" id="dungLuong" name="dungLuong" required>
                    <option value="">Chọn dung lượng</option>
                    <option value="64GB" {{ old('dungLuong') == '64GB' ? 'selected' : '' }}>64GB</option>
                    <option value="128GB" {{ old('dungLuong') == '128GB' ? 'selected' : '' }}>128GB</option>
                    <option value="256GB" {{ old('dungLuong') == '256GB' ? 'selected' : '' }}>256GB</option>
                    <option value="512GB" {{ old('dungLuong') == '512GB' ? 'selected' : '' }}>512GB</option>
                    <option value="1TB" {{ old('dungLuong') == '1TB' ? 'selected' : '' }}>1TB</option>
                    <option value="2TB" {{ old('dungLuong') == '2TB' ? 'selected' : '' }}>2TB</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="ram" class="form-label">Ram</label>
                <input type="text" class="form-control" id="ram" name="ram" value="{{ old('ram') }}">
            </div>
            <div class="col-md-3">
                <label for="chip" class="form-label">Chip</label>
                <input type="text" class="form-control" id="chip" name="chip" value="{{ old('chip') }}">
            </div>
            <div class="col-md-3">
                <label for="hz" class="form-label">Tần Số Hz</label>
                <input type="text" class="form-control" id="hz" name="hz" value="{{ old('hz') }}">
            </div>
        </div>
        {{-- Row mới cho DanhMuc --}}
        <div class="row mt-4" style="margin-left: 15px;">
            <div class="col-md-3">
                <label for="maDanhMuc" class="form-label">Danh Mục Sản Phẩm</label>
                <select class="form-select" id="maDanhMuc" name="maDanhMuc" required>
                    <option value="">Chọn danh mục</option>
                    @foreach($danhMucs as $danhMuc)
                        <option value="{{ $danhMuc->maDanhMuc }}" {{ old('maDanhMuc') == $danhMuc->maDanhMuc ? 'selected' : '' }}>{{ $danhMuc->tenDanhMuc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-9"></div> {{-- Spacer để cân layout --}}
        </div>
        <div class="row mt-4" style="margin-left: 15px;">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <button style="min-width: 490px; min-height: 30px;" type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
            </div>
        </div>
    </div>
</form>
@endsection
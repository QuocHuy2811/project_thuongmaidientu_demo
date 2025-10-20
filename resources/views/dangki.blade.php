@extends('layouts.app')

@section('title', 'Product Page - uStora Demo')

@section('navTitle','Đăng ký')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dangky.css') }}">
@section('js')

@section('content')
    <div class="register-container">
        <div class="register-form">
            <h2>Đăng Ký Khách Hàng</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Họ và Tên</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Nhập lại Mật khẩu</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="form-group">
                    <label for="dob">Ngày tháng năm sinh</label>
                    <input type="date" id="dob" name="dob" value="<?php echo isset($dob) ? $dob : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Giới Tính</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="Nam" required> Nam</label>
                        <label><input type="radio" name="gender" value="Nữ"> Nữ</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" id="address" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required>
                </div>
                <button type="submit">Đăng Ký</button>
            </form>
        </div>
    </div>
@endsection
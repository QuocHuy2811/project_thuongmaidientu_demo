@extends('layouts.app')

@section('title', 'Liên hệ')

@section('navTitle', 'Liên hệ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@section('js')

@section('content')
<div class="contact-container">
    <div class="contact-form">
        <h2>Liên Hệ Với Chúng Tôi</h2>
        <form method="POST" action="/contact">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" id="exampleInputEmail1" name="exampleInputEmail1" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputSDT">Số Điện Thoại</label>
                <input type="text" id="exampleInputSDT" name="exampleInputSDT" value="<?php echo isset($sdt) ? $sdt : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTieuDe">Tiêu đề</label>
                <input type="text" id="exampleInputTieuDe" name="exampleInputTieuDe" value="<?php echo isset($tieuDe) ? $tieuDe : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputNoidung">Nội dung</label>
                <textarea id="exampleInputNoidung" name="exampleInputNoidung"><?php echo isset($noidung) ? $noidung : ''; ?></textarea>
            </div>
            <button type="submit">Gửi Liên Hệ</button>
        </form>
    </div>
</div>
@endsection
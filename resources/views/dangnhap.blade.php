@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('navTitle', 'Đăng nhập')

@section('css')

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#login-form').on('submit', function(e) {
            e.preventDefault(); // Ngăn tải lại trang

            // Xóa thông báo cũ
            $('#email-error').hide().text('');
            $('#password-error').hide().text('');
            $('#success-message').hide().text('');

            // Gửi yêu cầu Ajax
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Xóa thông báo lỗi trước khi hiển thị thông báo thành công
                    $('#error-message').hide().text('');
                    $('#email-error').hide().text('');
                    $('#password-error').hide().text('');
                    if (response.success) {
                         $('#success-message').text('Đăng nhập thành công! Đang chuyển hướng...').show();
                        // Redirect dựa trên role
                        let redirectUrl = response.role === 'admin' ? "{{ route('admin.home') }}" : "{{ route('home') }}";
                        setTimeout(function() {
                            window.location.href = redirectUrl; // Chuyển hướng sau 1 giây
                        }, 1000);
                    }
                },
                error: function(xhr) {
                    // Xóa thông báo cũ
                    $('#email-error').hide().text('');
                    $('#error-message').hide().text('');
                    $('#password-error').hide().text('');

                    // Kiểm tra lỗi xác thực
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.exampleInputEmail1) {
                            $('#email-error').text(errors.exampleInputEmail1[0]).show();
                        }
                        if (errors.exampleInputPassword) {
                            $('#password-error').text(errors.exampleInputPassword[0]).show();
                        }
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        // Hiển thị lỗi đăng nhập sai
                        $('#error-message').text(xhr.responseJSON.message).show();
                    } else {
                        // Lỗi không xác định
                        $('#error-message').text('Đã có lỗi xảy ra. Vui lòng thử lại.').show();
                    }
                }
            });
        });
    });
    </script>
@section('content')
<style>
    .contact-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 50vh;
        background-color: #f5f5f5;
        padding: 20px 0;
    }
    .contact-form {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 450px;
    }
    .contact-form h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    .contact-form .form-group {
        margin-bottom: 15px;
    }
    .contact-form label {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-weight: normal;
    }
    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .contact-form input:focus,
    .contact-form textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }
    .contact-form .error {
        color: red;
        font-size: 12px;
        margin-top: 5px;
        text-align: left;
        display: none; /* Ẩn ban đầu */
    }
    .contact-form .success {
        color: green;
        font-size: 14px;
        margin-top: 10px;
        text-align: center;
        display: none; /* Ẩn ban đầu */
    }
    .contact-form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    .contact-form button:hover {
        background-color: #0056b3;
    }
</style>
<div class="contact-container">
    <div class="contact-form">
        <h2>Đăng nhập</h2>
        <div class="error" id="error-message"></div>
        <div class="success" id="success-message"></div>
        <form id="login-form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" id="exampleInputEmail1" name="exampleInputEmail1" value="{{ old('exampleInputEmail1') }}">
                <div class="error" id="email-error"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Mật khẩu</label>
                <input type="password" id="exampleInputPassword" name="exampleInputPassword">
                <div class="error" id="password-error"></div>
            </div>
            <button type="submit">Đăng nhập</button>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </form>
    </div>
</div>

@endsection
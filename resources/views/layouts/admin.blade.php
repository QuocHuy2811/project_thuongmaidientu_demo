<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome 5.15.4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="col-md-2 d-flex">
            <p style="font-size: 25px;">Adminator</p>
        </div>
        <div class="col-md-1 a-menu">
            <a style="color: grey;" href="#"><i class="fas fa-bars"></i></a> <!-- Icon menu -->
        </div>
        <div class="col-md-1 a-seach">
            <a style="color: grey;" href="#"><i class="fas fa-search"></i></a> <!-- Icon tìm kiếm -->
        </div>
        <div class="col-md-7 gap-4">
            <a href="#"><i class="fas fa-bell"></i></a> 
            <a href="#"><i class="fas fa-envelope"></i></a> 
            <a href="#"><i class="fas fa-user"></i></a>
            <a href="{{ route('logout') }}" onclick="return confirm('Bạn có chắc muốn đăng xuất?')">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </a>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-1 navbar navbar-expand-lg bg-body-tertiary" style="max-width: 60px;"></div>
        <div class="col-md-2 bg-body-tertiary" style="max-width: 208px; min-height:100vh;">
            <div class="d-flex mt-4">
                <a href="{{ route('home') }}"><i class="fas fa-home" style="margin-right: 14px; color: red"></i>Home Page</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="{{ route('admin.home') }}"><i class="fas fa-home" style="margin-right: 14px; color: mediumturquoise"></i>Dashboard</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-envelope" style="margin-right: 14px; color:mediumpurple"></i>Email</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-edit" style="margin-right: 14px; color:mediumturquoise"></i>Compose</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-calendar" style="margin-right: 14px; color:cadetblue"></i>Calendar</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-comments" style="margin-right: 14px; color: grey"></i>Chat</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-chart-bar" style="margin-right: 14px; color:mediumpurple"></i>Charts</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-list" style="margin-right: 14px; color:mediumspringgreen"></i>Forms</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-layer-group" style="margin-right: 14px; color:mediumvioletred"></i>UI Elements</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-table" style="margin-right: 14px; color:gold"></i>Table</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-map" style="margin-right: 14px; color:mediumpurple"></i>Maps</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-copy" style="margin-right: 14px; color:yellowgreen"></i>Pages</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="#"><i class="fas fa-stream" style="margin-right: 14px; color:mediumpurple"></i>Mulitiple Levels</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="{{ route('admin.blankpageadmin') }}"><i class="fas fa-file" style="margin-right: 14px; color:grey;"></i>Blank Page</a> 
            </div>
            <div class="d-flex mt-3">
                <a href="{{ route('admin.themsanpham') }}"><i class="fas fa-list" style="margin-right: 14px; color:mediumpurple;"></i>Add Product</a> 
            </div>
        </div>
        <div class="col-md-9">@yield('content')</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
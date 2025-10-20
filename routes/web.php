<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\loginController;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
// use Psy\TabCompletion\Matcher\FunctionsMatcher;

Route::get('/contact', [LienHeController::class, 'index'])->name('contact');
Route::post('/contact', [LienHeController::class, 'store']);
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);

Route::get('/', [HomeController::class, 'test_sp'])->name('home');
Route::get('/home', [HomeController::class, 'test_sp']);
Route::group(['middleware' => ['web']], function () {
    Route::get('/dangnhap', function () {
        return view('dangnhap');
    })->name('dangnhap');
    Route::get('/logout', function () {
        Session::flush();  // Xóa toàn bộ session
        return redirect()->route('dangnhap')->with('success', 'Đăng xuất thành công.');
    })->name('logout');
    Route::get('/shop', function () {
        return view('shop');
    })->name('shop');

    Route::get('/single/{slug}', [HomeController::class, 'show_product'])->name('single');
    Route::get('/single', function(){
        return view('single');
    })->name('single.static');
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/dangki', function () {
        return view('dangki');
    })->name('dangki');

});
Route::prefix('admin')->middleware(['admin.auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/them-san-pham',[AdminController::class,'themSanPham'])->name('admin.themsanpham');
    Route::post('/them-san-pham',[AdminController::class,'storeSanPham'])->name('admin.store-san-pham');
    Route::get('/blankpage',[AdminController::class,'blankPage'])->name('admin.blankpageadmin');
});
// Route::get('/test-db', function () {
//     try {
//         DB::connection()->getPdo();
//         return 'Kết nối database thành công!';
//     } catch (\Exception $e) {
//         return 'Lỗi kết nối: ' . $e->getMessage();
//     }
// });
//Route::get('/test_sp', [HomeController::class, 'test_sp']);
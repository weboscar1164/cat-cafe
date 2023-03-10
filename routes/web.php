<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCatController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});


//お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');


//管理画面
Route::prefix('/admin')
    ->name('admin.')
    ->group(function () {
        //ログイン時のみアクセス可能なルート
        Route::middleware('auth')
            ->group(function () {

                //ブログ
                Route::resource('/blogs', AdminBlogController::class)->except('show');

                //ログアウト
                Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

                //コンタクト
                Route::resource('/contacts', AdminContactController::class);

                //ねこ
                Route::resource('/cat', AdminCatController::class);

                //カテゴリ
                Route::resource('/category', AdminCategoryController::class);


                //ユーザー管理
                Route::resource('/users', AdminUserController::class);
            });

        //未ログイン時のみアクセス可能なルート
        Route::middleware('guest')
            ->group(function () {
                //認証
                Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
                Route::post('/login', [AuthController::class, 'login']);

                //ユーザー登録
                Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
                Route::post('/register', [AuthController::class, 'register']);
            });
    });

Route::get('/phpinfo', function () {
    phpinfo();
});
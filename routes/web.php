<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login/{provider}', [App\Http\Controllers\SocialLoginController::class, 'redirect']);
Route::get('login/{provider}/callback',[App\Http\Controllers\SocialLoginController::class, 'Callback']);

Route::match(['get','post'],'admin/login',[App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin-login');
Route::group(['namespace' => 'Admin', 
            'prefix' => 'admin', 'middleware' => 'admin'], function() {
    //Admin Route List
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::match(['get','post'],'settings',[App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('admin-settings');
    Route::post('check-password',[App\Http\Controllers\Admin\AdminController::class, 'checkPassword'])->name('check-password');
    Route::post('update-password',[App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('update-password');
    Route::match(['get','post'],'update-admin-details',[App\Http\Controllers\Admin\AdminController::class, 'updateAdminDetails'])->name('update-admin-details');
    Route::get('logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin-logout');
});

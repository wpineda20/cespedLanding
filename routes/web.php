<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SettingController;

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


Route::get('/', [ViewsController::class, 'welcome']);
Route::post('/api/web/quotation', [QuotationController::class, 'store']);

Auth::routes(['verify' => true, 'remember_me' => false, 'register' => false]);

Route::group(['middleware' => ['auth', 'verified', 'log', 'throttle:web']], function () {
    // Apis
    Route::resource('/api/web/user', UserController::class);
    Route::resource('/api/web/role', RoleController::class);
    Route::resource('/api/web/permission', PermissionController::class);
    Route::post('/api/web/user/search', [UserController::class, 'search']);
    Route::post('/api/web/user/block', [UserController::class, 'block']);

    // Views
    Route::get('/home', fn () => view('quotations'));
    Route::get('/user', [ViewsController::class, 'user']);
    Route::get('/role', [ViewsController::class, 'role']);
    Route::get('/settings', fn () => view('settings'));
    Route::get('/quotations', fn () => view('quotations'));

    Route::resource('/api/web/quotation', QuotationController::class);
    Route::get('/api/web/setting', [SettingController::class, 'index']);
    Route::post('/api/web/setting', [SettingController::class, 'store']);
});

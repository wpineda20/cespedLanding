<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubsidiaryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ViewsController;

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

Auth::routes(['verify' => true, 'remember_me' => false, 'register' => false]);

Route::group(['middleware' => ['auth', 'verified', 'log', 'throttle:web']], function () {
    // Apis
    Route::resource('/api/web/department', DepartmentController::class);
    Route::resource('/api/web/municipality', MunicipalityController::class);
    Route::resource('/api/web/user', UserController::class);
    Route::resource('/api/web/role', RoleController::class);
    Route::resource('/api/web/permission', PermissionController::class);
    Route::post('/api/web/user/search', [UserController::class, 'search']);
    Route::post('/api/web/user/block', [UserController::class, 'block']);
    Route::resource('/api/web/customer', CustomerController::class);
    Route::post('/api/web/customer/delete', [CustomerController::class, 'destroy']);
    Route::resource('/api/web/subsidiary', SubsidiaryController::class);

    // Views
    Route::get('/home', [ViewsController::class, 'home']);
    Route::get('/country', [ViewsController::class, 'country']);
    Route::get('/department', [ViewsController::class, 'department']);
    Route::get('/municipality', [ViewsController::class, 'municipality']);
    Route::get('/user', [ViewsController::class, 'user']);
    Route::get('/category', [ViewsController::class, 'category']);
    Route::get('/presentation', [ViewsController::class, 'presentation']);
    Route::get('/brand', [ViewsController::class, 'brand']);
    Route::get('/product', [ViewsController::class, 'product']);
    Route::get('/role', [ViewsController::class, 'role']);
});

Route::resource('/api/web/customer', CustomerController::class);
Route::post('/api/web/customer', [CustomerController::class, 'destroy']);

Route::resource('/api/web/subsidiary', SubsidiaryController::class);
Route::post('/api/web/subsidiary', [SubsidiaryController::class, 'destroy']);

Route::resource('/api/web/category', CategoryController::class);
Route::post('/api/web/category', [CategoryController::class, 'destroy']);

Route::resource('/api/web/brand', BrandController::class);
Route::post('/api/web/brand', [BrandController::class, 'destroy']);

Route::resource('/api/web/presentation', PresentationController::class);
Route::post('/api/web/presentation', [PresentationController::class, 'destroy']);

Route::resource('/api/web/product', ProductController::class);
Route::post('/api/web/product', [ProductController::class, 'destroy']);

Route::resource('/api/web/supplier', SupplierController::class);
Route::post('/api/web/supplier', [SupplierController::class, 'destroy']);

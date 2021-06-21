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


Route::group(['middleware' => ['auth','admin']], function() {

   Route::get('/dashboard', function () {
    return view('admin.dashboard');
   });

Route::get('/role-register', [App\Http\Controllers\Admin\DashboardController::class, 'registered'])->name('role-register');

Route::get('/role-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit']);
Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate']);
Route::delete('/role-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete']);
Route::get('/abouts', [App\Http\Controllers\Admin\AboutusController::class, 'index']);
Route::post('/save-aboutus', [App\Http\Controllers\Admin\AboutusController::class, 'store']);
Route::get('/about-us/{id}', [App\Http\Controllers\Admin\AboutusController::class, 'edit']);
Route::put('/aboutus-update/{id}', [App\Http\Controllers\Admin\AboutusController::class, 'update']);
Route::delete('/about-us-delete/{id}', [App\Http\Controllers\Admin\AboutusController::class, 'delete']);

Route::get('/service-category', [App\Http\Controllers\Admin\ServiceController::class, 'index']);
Route::get('/service-create', [App\Http\Controllers\Admin\ServiceController::class, 'create']);
Route::post('/category-store', [App\Http\Controllers\Admin\ServiceController::class, 'store']);
Route::get('/service-cate-edit/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit']);
Route::put('/category-update/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update']);

});



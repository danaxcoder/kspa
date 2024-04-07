<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/get_apps', [AdminController::class, 'get_apps']);
Route::post('/admin/search_app', [AdminController::class, 'search_app']);
Route::post('/admin/get_accounts', [AdminController::class, 'get_accounts']);
Route::post('/admin/search_account', [AdminController::class, 'search_account']);
Route::get('/admin/get_admins', [AdminController::class, 'get_admins']);
Route::post('/admin/search_admin', [AdminController::class, 'search_admin']);
Route::post('/admin/add', [AdminController::class, 'add_admin']);
Route::post('/admin/delete', [AdminController::class, 'delete_admin']);
Route::post('/admin/update', [AdminController::class, 'update_admin']);
Route::post('/admin/delete_account', [AdminController::class, 'delete_account']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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

/*Routes for Material*/

Route::get('material', [AdminController::class, 'show_material'])->name('show.material');
Route::post('/material/create-material', [AdminController::class, 'create_material'])->name('create.material');
Route::post('/material/edit-material', [AdminController::class, 'edit_material'])->name('edit.material');
Route::get('/material/delete-material/{id}', [AdminController::class, 'delete_material'])->name('delete.material');

/*Routes for Material*/

Route::get('/sub_material', [AdminController::class, 'sub_material'])->name('show.sub_material');
Route::post('sub_material/add', [AdminController::class, 'add_sub_material'])->name('add.sub_material');
Route::post('sub_material/edit', [AdminController::class, 'edit_sub_material'])->name('edit.sub_material');
Route::get('sub-material/delete/{id}', [AdminController::class, 'delete_sub_material'])->name('delete.sub_material');

/*Routes for Material*/

Route::get('/vendor', [AdminController::class, 'vendor'])->name('show.vendor');
Route::post('vendor/add', [AdminController::class, 'add_vendor'])->name('add.vendor');
Route::post('vendor/edit', [AdminController::class, 'edit_vendor'])->name('edit.vendor');
Route::get('vendor/delete/{id}', [AdminController::class, 'delete_vendor'])->name('delete.vendor');
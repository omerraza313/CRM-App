<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GRNReportController;


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

/*Routes for Sub Material*/

Route::get('/sub_material', [AdminController::class, 'sub_material'])->name('show.sub_material');
Route::post('sub_material/add', [AdminController::class, 'add_sub_material'])->name('add.sub_material');
Route::post('sub_material/edit', [AdminController::class, 'edit_sub_material'])->name('edit.sub_material');
Route::get('sub-material/delete/{id}', [AdminController::class, 'delete_sub_material'])->name('delete.sub_material');

/*Routes for Unit*/

Route::get('unit', [AdminController::class, 'show_unit'])->name('show.unit');
Route::post('/unit/create-unit', [AdminController::class, 'create_unit'])->name('create.unit');
Route::post('/unit/edit-unit', [AdminController::class, 'edit_unit'])->name('edit.unit');
Route::get('/unit/delete-unit/{id}', [AdminController::class, 'delete_unit'])->name('delete.unit');

/*Routes for Vendor	*/

Route::get('/vendor', [AdminController::class, 'vendor'])->name('show.vendor');
Route::post('vendor/add', [AdminController::class, 'add_vendor'])->name('add.vendor');
Route::post('vendor/edit', [AdminController::class, 'edit_vendor'])->name('edit.vendor');
Route::get('vendor/delete/{id}', [AdminController::class, 'delete_vendor'])->name('delete.vendor');


/*Routes for GRN Notes*/

Route::get('/grn', [GRNReportController::class, 'index'])->name('kpo.grn.show');
Route::get('/grn_add', [GRNReportController::class, 'CreatGrn'])->name('kpo.create.grn');
Route::post('grn_add', [GRNReportController::class, 'UpdateGrn'])->name('kpo.insert.grn');

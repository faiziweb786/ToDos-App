<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['web', 'auth'])->group(function () {
Route::get('items' , [PageController::class , 'viewData'])->name('viewdata');
// Route::get('/additem' , [PageController::class , 'addItem'])->name('additem');
Route::POST('additem' , [PageController::class , 'storeData'])->name('storedata');
Route::get('deleteitem/{id}' , [PageController::class , 'deleteEntry'])->name('deleteitem');
Route::get('edit/{id}' , [PageController::class , 'editData'])->name('editdata');
Route::POST('update/{id}', [PageController::class , 'updateData'])->name('updatedata');
});




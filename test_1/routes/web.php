<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;


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
    return redirect()->route('categories.index');
});

Route::resource('/categories', CategoryController::class);
Route::resource('/songs', SongController::class);



// Route::get('/', function () { //get, put, patch(truyền đi) post, update, delete: lấy về 
//     return redirect()->route('categories.index'); // chuyển hướng sang trang index dưới function của DoctorController
// });
// Route::resource('/categories',CategoryController::class); // resource: mapping tự động sinh đường dẫn
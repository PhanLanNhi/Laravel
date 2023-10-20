<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
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

// Route::get('/', function () {
//     return view('home'); // tra ra trang home
// });


// ten ham o controller
Route::get('/', [HomeController::class, 'getAllArticles']);

Route::resource('articles', ArticleController::class);

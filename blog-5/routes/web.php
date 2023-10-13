<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('Homepage');  // trả về 1 chuỗi
// });

Route::get('/welcome', function () {
    return view('welcome'); // trả về 1 trang có tên welcome trong view
});

// Route::get('/getting', function(){
//     return view('getting');
// });


// Xử lý method GET
Route::get('/welcome', [WelcomeController::class, "index"]);

// Xử lý method POST
Route::get('/welcome/add', [WelcomeController::class, "add"])->name("welcome.add");
Route::post('/welcome/save', [WelcomeController::class, "save"])->name("welcome.save");
// Route::get('/welcome/save', [WelcomeController::class, "save"])->name("welcome.save");


//  Xử lý PUT
Route::get('/welcome/edit', [WelcomeController::class, "edit"])->name("welcome.edit");
Route::put('/welcome/update', [WelcomeController::class, "update"])->name("welcome.update");
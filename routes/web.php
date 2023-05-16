<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
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


// Route::middleware(['guest'])->group(function () {
// Route::get('/home', function () {
//     return redirect('/login');
// });



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login/proses', [LoginController::class, 'proses_login']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register/proses', [RegisterController::class, 'proses_register']);
Route::get('/logout', [LoginController::class, 'logout']);
// });



Route::middleware(['auth'])->group(function () {


    Route::get('/aaa', function ($id) {
        return "aaaaa";
    });
    Route::get('/', function () {
        return redirect('/home');
    });



    Route::get('/logout', [LoginController::class, 'logout']);

    Route::prefix('home')->group(function () {
        Route::get('/', [MasterDataController::class, 'data'])->name('admin.dashboard');

        Route::get('/create', function () {
            return view('admin.create');
        })->name('admin.create');

        Route::post('/create/proses', [MasterDataController::class, 'proses_create']);

        Route::post('/update/proses', [MasterDataController::class, 'proses_update']);

        Route::get('/delete/{id}', [MasterDataController::class, 'proses_delete']);

        Route::get('/search', [MasterDataController::class, 'search_data']);

        Route::get('/update/{id}', [MasterDataController::class, 'update']);
    });
});

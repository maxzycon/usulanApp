<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengusulanController;
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
    return redirect()->route("login");
});

Route::middleware(["auth"])->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/usulan',[PengusulanController::class,'index'])->name('pengusulan');
    Route::get('/usulan/export',[PengusulanController::class,'export'])->name('pengusulan.export');
});

require __DIR__.'/auth.php';

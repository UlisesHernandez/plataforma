<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//DB::listen(function ($query){
//    dump($query->sql);
//});

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\RoleController;

//Route::middleware(['auth', 'role:admin'])->group(function () {
//    Route::resource('roles', RoleController::class);
//});

Route::group(['middleware'=>['auth']],function (){
    Route::resource('roles',RoleController::class);
    Route::resource('usuarios',UserController::class);
//    Route::resource('blogs',BlogController::class);
});

require __DIR__.'/auth.php';

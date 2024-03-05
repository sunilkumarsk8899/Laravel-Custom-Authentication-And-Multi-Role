<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

Route::get('/login', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/add',function(){
    // return User::create([
    //     'role_type' => 'user',
    //     'name' => 'user',
    //     'email' => 'user@gmail.com',
    //     'password' => Hash::make('Fsmdev@123'),
    // ]);
});

Route::post('/login_store',[MultiAuthController::class,'MultiAuthLogin'])->name('login_store');
Route::get('/',[MultiAuthController::class,'home'])->name('home');
Route::get('/home',[MultiAuthController::class,'home'])->name('home');
Route::get('/logout',[MultiAuthController::class,'logout'])->name('logout');



Route::group([ 'prefix'=>'super-admin','as'=>'super_admin.', 'middleware' => ['auth','super_admin'] ], function(){

    Route::get('/',[SuperAdminController::class,'index'])->name('index');
    Route::get('/home',[SuperAdminController::class,'index'])->name('home');

});

Route::group([ 'prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth','admin'] ], function(){

    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/home',[AdminController::class,'index'])->name('home');

});

Route::group([ 'prefix'=>'user','as'=>'user.', 'middleware' => ['auth','user'] ], function(){

    Route::get('/',[UserController::class,'index'])->name('index');
    Route::get('/home',[UserController::class,'index'])->name('home');

});



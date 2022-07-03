<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataJalanController;
use App\Http\Controllers\KelolaDataJalanController;
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

// Route::get('/', function () {
//     return view('layouts.master');
// });
Route::get('login', function () {
    
    if(auth()->check()){
        return redirect('/');
    }else{
        return view('auth.login');
    }

})->name('login');

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/', [DataJalanController::class, 'getdata']);

Route::middleware(['middleware' => 'auth'])->group(function () {

  
    Route::resource('datajalan', KelolaDataJalanController::class);
    Route::get('createmaps',function(){
        return view('layouts.mapscoba');
    });
    
});

   Route::get('c',function(){
        return view('layouts.createmaps');
    });

    Route::get('list-jalan',[KelolaDataJalanController::class,'jalan_landpage']);

<?php

use App\Http\Controllers\dashboardControlle;
use App\Http\Controllers\dashboardPostController;
use App\Http\Controllers\homeArtikelController;
use App\Http\Controllers\homeBioController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [homeController::class, 'index', 'tpbio']);

Route::get('/login', [homeController::class, 'login'])->middleware('guest');
Route::post('login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/register', [homeController::class, 'register'])->middleware('guest');
Route::post('/register', [registerController::class, 'store']);

Route::get('/dashboard', [dashboardControlle::class, 'index'])->middleware('level');

Route::resource('/dashboard/post', dashboardPostController::class)->middleware('level');

Route::get('/home/baca/{id}', [homeController::class, 'show']);

Route::resource('/home/bio', homeBioController::class);

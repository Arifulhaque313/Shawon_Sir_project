<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
//     return view('trainee.traineeForm');
// });
Route::get('/',[UserController::class,'index']);
Route::get('/getDistrict',[UserController::class,'getDistrict'])->name('getDistrict');
Route::get('/getUpazila',[UserController::class,'getUpazila'])->name('getUpazila');
Route::get('/getUnion',[UserController::class,'getUnion'])->name('getUnion');
Route::post('/traineeStore',[UserController::class,'traineeStore'])->name('trainee.store');
Route::get('/countfilter',[UserController::class,'countfilter'])->name('count.filter');
Route::post('/userscount',[UserController::class,'userscount'])->name('users.count');

Route::get('/dashboard',[UserController::class,'view']);
// Route::get('/dashboard',function(){
//     return view('dashboard.index');
// });












Route::get('/districtView/{domain_id,domain_type_id}',[UserController::class,'districtview'])->name('district.view');





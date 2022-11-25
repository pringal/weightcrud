<?php

use Illuminate\Support\Facades\Route;
use Pringal\Weightcrud\Controllers\WeightController;

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


Route::post('/store',[WeightController::class, 'store'])->name("store");
Route::get('/datalist',[WeightController::class, 'datalist'])->name("datalist");
Route::get('/weight-crud', function () {
    //dd('as');
    //return view('weightcrud.resources.views.weight');
    return view('weightcrud::weight');
});
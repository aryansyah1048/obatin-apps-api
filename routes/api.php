<?php


use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\DrugController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DonaturController;

Route::resource('user', UserController::class);
Route::resource('hospital', HospitalController::class);
Route::resource('drug', DrugController::class);
Route::resource('news', NewsController::class);
Route::resource('donatur', DonaturController::class);
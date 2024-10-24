<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::get('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'show']);
Route::post('/customers', [\App\Http\Controllers\CustomerController::class, 'store']);
Route::patch('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'update']);
Route::delete('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy']);

Route::get('/companies', [\App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/companies/{id}', [\App\Http\Controllers\CompanyController::class, 'show']);
Route::post('/companies', [\App\Http\Controllers\CompanyController::class, 'store']);
Route::patch('/companies/{id}', [\App\Http\Controllers\CompanyController::class, 'update']);
Route::delete('/companies/{id}', [\App\Http\Controllers\CompanyController::class, 'destroy']);

//Route::get('/testing', function () {
//    $code = rand(100000, 999999);
//    \Illuminate\Support\Facades\Mail::to('azkadaiki26@gmail.com')->send(new \App\Mail\TestingMail($code));
//    return response()->json(['code' => $code]);
//});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

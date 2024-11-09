<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectsController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('projects', [ProjectsController::class,'index']);
Route::get('projects/create', [ProjectsController::class,'create']);
Route::post('projects', [ProjectsController::class,'store']);
Route::get('projects/{id}/edit', [ProjectsController::class,'edit']);
Route::put('projects/{id}', [ProjectsController::class, 'update']);
Route::delete('projects/{id}', [ProjectsController::class, 'destroy']);

Route::get('clients', [ClientController::class,'index']);
Route::get('clients/create', [ClientController::class,'create']);
Route::post('clients', [ClientController::class,'store']);
Route::get('clients/{id}/edit', [ClientController::class,'edit']);
Route::put('clients/{id}', [ClientController::class, 'update']);
Route::delete('clients/{id}', [ClientController::class, 'destroy']);



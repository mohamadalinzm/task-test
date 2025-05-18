<?php

use App\Http\Controllers\API\V1\Task\CreateTaskController;
use App\Http\Controllers\API\V1\Task\GetAllTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/v1/tasks', [GetAllTaskController::class, 'index'])
        ->name('api.tasks.index');

    Route::post('/v1/tasks', [CreateTaskController::class, 'store'])
        ->name('api.tasks.create');

});



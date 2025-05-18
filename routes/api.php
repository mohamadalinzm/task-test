<?php

use App\Http\Controllers\API\V1\Task\CreateTaskController;
use App\Http\Controllers\API\V1\Task\FindTaskByIdController;
use App\Http\Controllers\API\V1\Task\GetAllTaskController;
use App\Http\Controllers\API\V1\Task\UpdateTaskController;
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

    Route::get('/v1/tasks/{task}', [FindTaskByIdController::class, 'show'])
        ->name('api.tasks.show');

    Route::put('/v1/tasks/{task}', [UpdateTaskController::class, 'update'])
        ->name('api.tasks.update');

});



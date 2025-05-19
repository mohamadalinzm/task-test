<?php

use App\Http\Controllers\API\V1\Auth\LoginUserController;
use App\Http\Controllers\API\V1\Auth\LogoutUserController;
use App\Http\Controllers\API\V1\Auth\RegisterUserController;
use App\Http\Controllers\API\V1\Task\CreateTaskController;
use App\Http\Controllers\API\V1\Task\DeleteTaskController;
use App\Http\Controllers\API\V1\Task\FindTaskByIdController;
use App\Http\Controllers\API\V1\Task\GetAllTaskController;
use App\Http\Controllers\API\V1\Task\UpdateTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/v1/login', [LoginUserController::class, 'login']);
Route::post('/v1/register', [RegisterUserController::class, 'register']);
Route::middleware('auth:sanctum')->post('/v1/logout', [LogoutUserController::class, 'logout']);


Route::group(['middleware' => ['auth:sanctum','check.permission']], function () {

    Route::get('/v1/tasks', [GetAllTaskController::class, 'index'])
        ->name('api.tasks.index');

    Route::post('/v1/tasks', [CreateTaskController::class, 'store'])
        ->name('api.tasks.create');

    Route::get('/v1/tasks/{task}', [FindTaskByIdController::class, 'show'])
        ->name('api.tasks.show');

    Route::put('/v1/tasks/{task}', [UpdateTaskController::class, 'update'])
        ->name('api.tasks.update');

    Route::delete('/v1/tasks/{task}', [DeleteTaskController::class, 'destroy'])
        ->name('api.tasks.destroy');

});



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

Route::prefix('v1')->group(function () {
    Route::post('/login', [LoginUserController::class, 'login']);
    Route::post('/register', [RegisterUserController::class, 'register']);
    Route::middleware('auth:sanctum')->post('/logout', [LogoutUserController::class, 'logout']);

    Route::middleware(['auth:sanctum', 'check.permission'])->group(function () {
        Route::get('/tasks', [GetAllTaskController::class, 'index'])
            ->name('api.tasks.index');

        Route::post('/tasks', [CreateTaskController::class, 'store'])
            ->name('api.tasks.create');

        Route::get('/tasks/{task}', [FindTaskByIdController::class, 'show'])
            ->name('api.tasks.show');

        Route::put('/tasks/{task}', [UpdateTaskController::class, 'update'])
            ->name('api.tasks.update');

        Route::delete('/tasks/{task}', [DeleteTaskController::class, 'destroy'])
            ->name('api.tasks.destroy');
    });
});



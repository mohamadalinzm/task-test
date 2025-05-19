<?php

use App\Http\Controllers\Admin\GetAllTaskController;
use App\Http\Controllers\Admin\CreateTaskController;
use App\Http\Controllers\Admin\UpdateTaskController;
use App\Http\Controllers\Admin\DeleteTaskController;
use App\Http\Controllers\Admin\FindTaskByIdController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


Route::group(['middleware' => ['auth','check.permission'], 'prefix' => 'admin/tasks'],function(){

        Route::get('/', [GetAllTaskController::class,'index'])->name('web.task.index');
        Route::get('/create', [CreateTaskController::class,'create'])->name('web.task.create');
        Route::post('/', [CreateTaskController::class,'store'])->name('web.task.store');
        Route::get('/{task}', [FindTaskByIdController::class,'show'])->name('web.task.show');
        Route::get('/{task}/edit', [UpdateTaskController::class,'edit'])->name('web.task.edit');
        Route::put('/{task}', [UpdateTaskController::class,'update'])->name('web.task.update');
        Route::delete('/{task}', [DeleteTaskController::class,'destroy'])->name('web.task.destroy');
    });

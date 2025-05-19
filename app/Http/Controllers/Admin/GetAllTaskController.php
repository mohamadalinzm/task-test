<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Task;
use Illuminate\Contracts\View\View;

class GetAllTaskController extends BaseController
{
    public function index(): View
    {
        $tasks = Task::query()->latest()->paginate(25);

        return view('admin.task.index', compact('tasks'));
    }
}

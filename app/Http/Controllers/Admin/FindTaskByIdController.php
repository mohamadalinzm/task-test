<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Task;
use Illuminate\Contracts\View\View;

class FindTaskByIdController extends BaseController
{
    public function show(Task $task): View
    {
        return view('admin.task.show', compact('task'));
    }
}

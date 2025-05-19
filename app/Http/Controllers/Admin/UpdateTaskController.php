<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\V1\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UpdateTaskController extends BaseController
{
    public function edit(Task $task): View
    {
        return view('admin.task.edit', compact('task'));
    }

    public function update(Task $task, UpdateTaskRequest $request): RedirectResponse
    {

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect(route('web.task.index'));
    }
}

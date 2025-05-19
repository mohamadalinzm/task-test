<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\V1\Task\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CreateTaskController extends BaseController
{


    public function create(): View
    {
        $task = new Task();

        return view('admin.task.create', compact('task'));
    }

    public function store(CreateTaskRequest $request): RedirectResponse
    {
        Task::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,

        ]);

        return redirect(route('web.task.index'));
    }
}

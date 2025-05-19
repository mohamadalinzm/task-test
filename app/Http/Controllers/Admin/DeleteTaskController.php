<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class DeleteTaskController extends BaseController
{
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect(route('web.task.index'));
    }
}

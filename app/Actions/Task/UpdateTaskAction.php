<?php

namespace App\Actions\Task;

use App\Http\Requests\API\V1\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Traits\NewStaticTrait;

class UpdateTaskAction
{
    use NewStaticTrait;

    public function run(UpdateTaskRequest $request,Task $task): bool
    {
        return $task->update($request->validated());
    }

}

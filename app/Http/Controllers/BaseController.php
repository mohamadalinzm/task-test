<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Actions\Task\UpdateTaskAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class UpdateTaskController extends Controller
{
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        UpdateTaskAction::new()->run($request,$task);

        return response()->json([
            'success' => true,
            'data' => TaskResource::make($task->refresh()),
            'message' => 'The Task updated successfully.'
        ]);

    }
}

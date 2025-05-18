<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Actions\Task\CreateTaskAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Task\CreateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class CreateTaskController extends Controller
{
    public function store(CreateTaskRequest $request): JsonResponse
    {
        $task = CreateTaskAction::new()->run($request);

        return response()->json([
            'success' => true,
            'data' => TaskResource::make($task),
            'message' => 'The Task has been successfully created.'
        ]);

    }
}

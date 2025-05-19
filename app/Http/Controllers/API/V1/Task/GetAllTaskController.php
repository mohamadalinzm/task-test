<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Http\Controllers\BaseController;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class GetAllTaskController extends BaseController
{
    public function index(): JsonResponse
    {
        $task = Task::query()->get();

        return response()->json([
            'success' => true,
            'data' => TaskResource::collection($task),
            'message' => 'The Task has been successfully retrieved.'
        ]);

    }
}

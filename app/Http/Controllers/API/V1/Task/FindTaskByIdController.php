<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Http\Controllers\BaseController;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class FindTaskByIdController extends BaseController
{
    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => TaskResource::make($task),
            'message' => 'The Task has been successfully retrieved.'
        ]);
    }
}

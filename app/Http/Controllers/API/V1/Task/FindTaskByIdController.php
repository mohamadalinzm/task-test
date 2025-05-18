<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class FindTaskByIdController extends Controller
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

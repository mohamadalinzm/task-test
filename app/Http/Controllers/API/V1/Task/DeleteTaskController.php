<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Http\Controllers\BaseController;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class DeleteTaskController extends BaseController
{
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'The Task was deleted.'
        ]);
    }
}

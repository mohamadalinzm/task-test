<?php

namespace App\Http\Controllers\API\V1\Task;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateTaxAction;
use App\Http\Controllers\Task\TaskResource;

class CreateTaskController extends Controller
{
    public function store()
    {
        $task = CreateTaxAction::new()->run($request);

        return response()->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'The Task has been successfully created.'
        ]);

    }
}

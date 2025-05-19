<?php

namespace App\Actions\Auth;

use App\Http\Requests\API\V1\Task\CreateTaskRequest;
use App\Models\Task;
use App\Traits\NewStaticTrait;

class LogoutUserAction
{
    use NewStaticTrait;

    public function run(CreateTaskRequest $request)
    {
        $data = $request->validated();

        return Task::query()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
    }
}

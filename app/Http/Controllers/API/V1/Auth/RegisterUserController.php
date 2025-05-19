<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Actions\Auth\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class RegisterUserController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = RegisterUserAction::new()->run($request);

        return response()->json([
            'success' => true,
            'data' => UserResource::make($user),
            'token' => $user->createToken(
                'API token for ' . $user->email,
                ['*'],
                now()->addMonth())->plainTextToken,
            'message' => 'Authenticated.'
        ]);

    }
}

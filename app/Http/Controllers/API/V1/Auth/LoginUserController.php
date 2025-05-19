<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(LoginUserRequest $request): JsonResponse
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => 'Invalid credentials'
            ],401);
        }

        $user = User::query()->firstWhere('email', $request->validated('email'));

        return response()->json([
            'success' => true,
            'data' => UserResource::make($user),
            'token' => $user->createToken(
                'API token for ' . $user->email,
                ['*'],
                now()->addMonth())->plainTextToken,
            'message' => 'User authenticated successfully'
        ]);

    }
}

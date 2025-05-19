<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\TransientToken;

class LogoutUserController extends Controller
{
    public function logout(Request $request): JsonResponse
    {
        $token = $request->user()->currentAccessToken();

        // Only call delete() if it's not a TransientToken
        if (!($token instanceof TransientToken)) {
            $request->user()->tokens()->where('id', $token->id)->delete();
        }

        return response()->json([
            'success' => true,
            'data' => '',
            'message' => 'User logged out successfully'
        ]);
    }
}

<?php


namespace App\Repositories;


use App\Http\Resources\UserResource;
use App\Interfaces\ReturnUserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ReturnJsonUserRepository implements ReturnUserRepositoryInterface
{
    public function userData($user): JsonResponse
    {
        return response()->json([
            'token' => $user->createToken('user-token')->plainTextToken,
            'user' => new UserResource($user),
        ]);
    }

    public function failedLoginUserMessage(): JsonResponse
    {
        return response()->json([
            'code' => 422,
            'message' => __('auth.failed')
        ]);
    }
}

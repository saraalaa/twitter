<?php


namespace App\Repositories;


use App\Interfaces\ReturnFollowRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ReturnJsonFollowRepository implements ReturnFollowRepositoryInterface
{
    public function userFollowed(): JsonResponse
    {
        return response()->json([
            'code' => 200,
            'message' => __('messages.user_followed')
        ]);
    }
}

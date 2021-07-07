<?php


namespace App\Repositories;


use App\Http\Resources\TweetResource;
use App\Interfaces\ReturnTweetRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReturnJsonTweetRepository implements ReturnTweetRepositoryInterface
{
    public function tweetAdded(): JsonResponse
    {
        return response()->json([
            'code' => 200,
            'message' => __('messages.add_tweet')
        ]);
    }

    public function tweetsCollection($tweets): AnonymousResourceCollection
    {
        return TweetResource::collection($tweets);
    }
}

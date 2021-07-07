<?php


namespace App\Repositories;


use App\Interfaces\TweetRepositoryInterface;
use App\Models\Tweet;

class TweetRepository implements TweetRepositoryInterface
{
    public function timeline($user)
    {
        $following = $user->follows()->pluck('following_user_id');

        return Tweet::whereIn('user_id', $following)
            ->orWhere('user_id', $user->id)
            ->latest()
            ->paginate();
    }

    public function store($user, $data)
    {
        $user->tweets()->create($data);
    }
}

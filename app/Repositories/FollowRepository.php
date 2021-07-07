<?php


namespace App\Repositories;


use App\Interfaces\FollowRepositoryInterface;

class FollowRepository implements FollowRepositoryInterface
{
    public function follow($user, $followingUserId)
    {
        $user->follows()->attach($followingUserId);
    }
}

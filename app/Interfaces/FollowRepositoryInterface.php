<?php

namespace App\Interfaces;

interface FollowRepositoryInterface
{
    public function follow($user, $followingUserId);
}

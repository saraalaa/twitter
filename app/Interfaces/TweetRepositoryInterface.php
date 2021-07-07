<?php

namespace App\Interfaces;

interface TweetRepositoryInterface
{
    public function timeline($user);

    public function store($user, $data);

}

<?php

namespace App\Interfaces;


interface ReturnTweetRepositoryInterface
{
    public function tweetAdded();

    public function tweetsCollection($tweets);

}

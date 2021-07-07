<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Interfaces\ReturnTweetRepositoryInterface;
use App\Interfaces\TweetRepositoryInterface;

class TweetController extends Controller
{
    private ReturnTweetRepositoryInterface $returnTweetRepository;
    private TweetRepositoryInterface $tweetRepository;

    public function __construct(ReturnTweetRepositoryInterface $returnTweetRepository, TweetRepositoryInterface $tweetRepository)
    {
        $this->returnTweetRepository = $returnTweetRepository;
        $this->tweetRepository = $tweetRepository;
    }

    public function index()
    {
        $tweets = $this->tweetRepository->timeline(auth()->user());
        return $this->returnTweetRepository->tweetsCollection($tweets);
    }

    public function store(TweetRequest $request)
    {
        $this->tweetRepository->store(auth()->user(), $request->validated());
        return $this->returnTweetRepository->tweetAdded();
    }
}

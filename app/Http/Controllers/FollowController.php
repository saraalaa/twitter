<?php

namespace App\Http\Controllers;

use App\Http\Requests\FollowRequest;
use App\Interfaces\FollowRepositoryInterface;
use App\Interfaces\ReturnFollowRepositoryInterface;

class FollowController extends Controller
{

    private FollowRepositoryInterface $followRepository;
    private ReturnFollowRepositoryInterface $returnFollowRepository;

    public function __construct(FollowRepositoryInterface $followRepository, ReturnFollowRepositoryInterface $returnFollowRepository)
    {
        $this->followRepository = $followRepository;
        $this->returnFollowRepository = $returnFollowRepository;
    }

    public function follow(FollowRequest $request)
    {
        $this->followRepository->follow(auth()->user(), $request->following_user_id);
        return $this->returnFollowRepository->userFollowed();
    }
}

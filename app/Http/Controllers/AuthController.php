<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Interfaces\ReturnUserRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class AuthController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private ReturnUserRepositoryInterface $returnRepository;

    public function __construct(UserRepositoryInterface $userRepository, ReturnUserRepositoryInterface $returnRepository)
    {
        $this->userRepository = $userRepository;
        $this->returnRepository = $returnRepository;
    }

    public function signup(SignupRequest $request)
    {
        $user = $this->userRepository->create($request->validated());
        return $this->returnRepository->userData($user);
    }

    public function login(LoginRequest $request)
    {
        // get user
        $user = $this->userRepository->getByEmail();

        // check login
        if (!$this->userRepository->checkLoginSuccessfully($user))
        {
           return $this->returnRepository->failedLoginUserMessage();
        }
        return $this->returnRepository->userData($user);
    }
}

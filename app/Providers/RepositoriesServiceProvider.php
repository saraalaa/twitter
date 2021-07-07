<?php

namespace App\Providers;

use App\Interfaces\FollowRepositoryInterface;
use App\Interfaces\ReturnFollowRepositoryInterface;
use App\Interfaces\ReturnTweetRepositoryInterface;
use App\Interfaces\ReturnUserRepositoryInterface;
use App\Interfaces\TweetRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\FollowRepository;
use App\Repositories\ReturnJsonFollowRepository;
use App\Repositories\ReturnJsonTweetRepository;
use App\Repositories\ReturnJsonUserRepository;
use App\Repositories\TweetRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // returns
        $this->app->bind(ReturnUserRepositoryInterface::class, ReturnJsonUserRepository::class);
        $this->app->bind(ReturnTweetRepositoryInterface::class, ReturnJsonTweetRepository::class);
        $this->app->bind(ReturnFollowRepositoryInterface::class, ReturnJsonFollowRepository::class);
        // models
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TweetRepositoryInterface::class, TweetRepository::class);
        $this->app->bind(FollowRepositoryInterface::class, FollowRepository::class);
    }
}

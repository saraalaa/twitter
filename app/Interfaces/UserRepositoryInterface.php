<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function create($userData);

    public function getByEmail();

    public function checkLoginSuccessfully($user): bool;
}

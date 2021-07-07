<?php

namespace App\Interfaces;

interface ReturnUserRepositoryInterface
{
    public function userData($user);

    public function failedLoginUserMessage();
}

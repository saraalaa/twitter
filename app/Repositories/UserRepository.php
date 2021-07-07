<?php


namespace App\Repositories;


use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    use ImageTrait;

    public function create($userData)
    {
        $this->storeImage('image', 'userImage');
        return User::create($this->mergeImage($userData));
    }

    public function getByEmail()
    {
        return User::where('email', request()->email)->first();
    }

    public function checkLoginSuccessfully($user): bool
    {
        return $user &&  Hash::check(request()->password, $user->password);
    }

}


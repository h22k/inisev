<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;

class UserServices implements UserServiceInterface
{
    /**
     * @param  array  $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

}

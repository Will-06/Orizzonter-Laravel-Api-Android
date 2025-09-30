<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;

class UserServiceImpl extends BaseServiceImpl implements UserService 
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}

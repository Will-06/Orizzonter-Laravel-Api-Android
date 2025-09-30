<?php

namespace App\Services\Impl;

use App\Models\Follower;
use App\Services\FollowerService;

class FollowerServiceImpl extends BaseServiceImpl implements FollowerService 
{
    public function __construct(Follower $model)
    {
        parent::__construct($model);
    }
}

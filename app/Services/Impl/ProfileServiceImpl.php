<?php

namespace App\Services\Impl;

use App\Models\Profile;
use App\Services\ProfileService;

class ProfileServiceImpl extends BaseServiceImpl implements ProfileService 
{
    public function __construct(Profile $model)
    {
        parent::__construct($model);
    }
}

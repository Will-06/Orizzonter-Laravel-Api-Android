<?php

namespace App\Services\Impl;

use App\Models\UserCustomPlace;
use App\Services\UserCustomPlaceService;

class UserCustomPlaceServiceImpl extends BaseServiceImpl implements UserCustomPlaceService
{
    public function __construct(UserCustomPlace $model)
    {
        parent::__construct($model);
    }
}

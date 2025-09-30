<?php

namespace App\Services\Impl;

use App\Models\UserChallenge;
use App\Services\UserChallengeService;

class UserChallengeServiceImpl extends BaseServiceImpl implements UserChallengeService
{
    public function __construct(UserChallenge $model)
    {
        parent::__construct($model);
    }
}

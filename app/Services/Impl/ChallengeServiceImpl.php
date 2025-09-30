<?php

namespace App\Services\Impl;

use App\Models\Challenge;
use App\Services\ChallengeService;

class ChallengeServiceImpl extends BaseServiceImpl implements ChallengeService
{
    public function __construct(Challenge $model)
    {
        parent::__construct($model);
    }
}

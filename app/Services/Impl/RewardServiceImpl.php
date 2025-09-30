<?php

namespace App\Services\Impl;

use App\Models\Reward;
use App\Services\RewardService;

class RewardServiceImpl extends BaseServiceImpl implements RewardService 
{
    public function __construct(Reward $model)
    {
        parent::__construct($model);
    }
}

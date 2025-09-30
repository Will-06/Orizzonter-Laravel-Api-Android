<?php

namespace App\Services\Impl;

use App\Models\Statistic;
use App\Services\StatisticService;

class StatisticServiceImpl extends BaseServiceImpl implements StatisticService
{
    public function __construct(Statistic $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Services\Impl;

use App\Models\TravelRoute;
use App\Services\TravelRouteService;

class TravelRouteServiceImpl extends BaseServiceImpl implements TravelRouteService
{
    public function __construct(TravelRoute $model)
    {
        parent::__construct($model);
    }
}

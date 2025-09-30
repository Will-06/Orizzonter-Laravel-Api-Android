<?php

namespace App\Services\Impl;

use App\Models\SavedTravelRoute;
use App\Services\SavedTravelRouteService;

class SavedTravelRouteServiceImpl extends BaseServiceImpl implements SavedTravelRouteService
{
    public function __construct(SavedTravelRoute $model)
    {
        parent::__construct($model);
    }
}

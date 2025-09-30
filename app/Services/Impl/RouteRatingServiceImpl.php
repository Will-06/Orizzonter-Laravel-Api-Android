<?php

namespace App\Services\Impl;

use App\Models\RouteRating;
use App\Services\RouteRatingService;

class RouteRatingServiceImpl extends BaseServiceImpl implements RouteRatingService
{
    public function __construct(RouteRating $model)
    {
        parent::__construct($model);
    }
}

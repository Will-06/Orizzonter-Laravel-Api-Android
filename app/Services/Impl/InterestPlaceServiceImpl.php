<?php

namespace App\Services\Impl;

use App\Models\InterestPlace;
use App\Services\InterestPlaceService;

class InterestPlaceServiceImpl extends BaseServiceImpl implements InterestPlaceService 
{
    public function __construct(InterestPlace $model)
    {
        parent::__construct($model);
    }
}

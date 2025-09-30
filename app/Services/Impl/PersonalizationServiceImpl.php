<?php

namespace App\Services\Impl;

use App\Models\Personalization;
use App\Services\PersonalizationService;

class PersonalizationServiceImpl extends BaseServiceImpl implements PersonalizationService 
{
    public function __construct(Personalization $model)
    {
        parent::__construct($model);
    }
}

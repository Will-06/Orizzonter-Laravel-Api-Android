<?php

namespace App\Services\Impl;

use App\Models\Configuration;
use App\Services\ConfigurationService;

class ConfigurationServiceImpl extends BaseServiceImpl implements ConfigurationService 
{
    public function __construct(Configuration $model)
    {
        parent::__construct($model);
    }
}

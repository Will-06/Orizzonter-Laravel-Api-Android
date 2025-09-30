<?php

namespace App\Services\Impl;

use App\Models\Media;
use App\Services\MediaService;

class MediaServiceImpl extends BaseServiceImpl implements MediaService 
{
    public function __construct(Media $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Services\Impl;

use App\Models\RouteComment;
use App\Services\RouteCommentService;

class RouteCommentServiceImpl extends BaseServiceImpl implements RouteCommentService
{
    public function __construct(RouteComment $model)
    {
        parent::__construct($model);
    }
}

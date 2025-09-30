<?php

namespace App\Services\Impl;

use App\Models\Announcement;
use App\Services\RoleService;

class AnnouncementServiceImpl extends BaseServiceImpl implements RoleService
{
    public function __construct(Announcement $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Services\Impl;

use App\Models\Role;
use App\Services\RoleService;

class RoleServiceImpl extends BaseServiceImpl implements RoleService 
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}

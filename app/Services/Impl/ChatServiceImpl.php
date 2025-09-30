<?php

namespace App\Services\Impl;

use App\Services\ChatService;

class ChatServiceImpl extends BaseServiceImpl implements ChatService 
{
    public function __construct(ChatService $model)
    {
        parent::__construct($model);
    }
}

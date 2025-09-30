<?php

namespace App\Services\Impl;

use App\Models\Message;
use App\Services\MessageService;

class MessageServiceImpl extends BaseServiceImpl implements MessageService 
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
}

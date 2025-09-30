<?php

namespace App\Services\Impl;

use App\Models\ChatParticipant;
use App\Services\ChatParticipantService;

class ChatParticipantServiceImpl extends BaseServiceImpl implements ChatParticipantService 
{
    public function __construct(ChatParticipant $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace AnyOption\Responses;

use AnyOption\Response;
use AnyOption\Payload;

class GetUserDetails extends Response
{

    CONST FIELD_USER_MESSAGES = 'userMessages';

    CONST FIELD_USER = 'user';

    /**
     * @var array
     */
    protected $userMessages = [];

    protected $user = [];

    /**
     * @inheritdoc
     */
    public function __construct(Payload $payload){
        parent::__construct($payload);
        $this->userMessages = isset($payload[static::FIELD_USER_MESSAGES]) ? $payload[static::FIELD_USER_MESSAGES] : [];
        $this->user = isset($payload[static::FIELD_USER]) ? $payload[static::FIELD_USER] : [];
    }

    public function getUserMessages(){
        return $this->userMessages;
    }

    public function getUser(){
        return $this->user;
    }
}
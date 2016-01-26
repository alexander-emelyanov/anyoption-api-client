<?php

namespace AnyOption\Responses;

use AnyOption\Response;
use AnyOption\Payload;

class GetFTDUsersByDate extends Response
{

    CONST FIELD_USER_MESSAGES = 'userMessages';

    CONST FIELD_USER = 'user';

    CONST FIELD_FTD_USERS_LIST = 'FTDUsersList';

    /**
     * @var array
     */
    protected $userMessages = [];

    protected $user = [];

    protected $ftdUsersList = [];

    /**
     * @inheritdoc
     */
    public function __construct(Payload $payload){
        parent::__construct($payload);
        $this->userMessages = isset($payload[static::FIELD_USER_MESSAGES]) ? $payload[static::FIELD_USER_MESSAGES] : [];
        $this->user = isset($payload[static::FIELD_USER]) ? $payload[static::FIELD_USER] : [];
        $this->ftdUsersList = isset($payload[static::FIELD_FTD_USERS_LIST]) ? $payload[static::FIELD_FTD_USERS_LIST] : [];
    }

    public function getUserMessages(){
        return $this->userMessages;
    }

    public function getUser(){
        return $this->user;
    }

    public function getFTDUsersList(){
        return $this->getFTDUsersList();
    }
}
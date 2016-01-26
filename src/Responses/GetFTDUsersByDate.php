<?php

namespace AnyOption\Responses;

use AnyOption\Response;
use AnyOption\Payload;

class GetFTDUsersByDate extends Response
{

    CONST FIELD_FTD_USERS_LIST = 'FTDUsersList';

    protected $ftdUsersList = [];

    /**
     * @inheritdoc
     */
    public function __construct(Payload $payload){
        parent::__construct($payload);
        $this->ftdUsersList = isset($payload[static::FIELD_FTD_USERS_LIST]) ? $payload[static::FIELD_FTD_USERS_LIST] : [];
    }

    /**
     * Returns array of FTD users
     * @return array
     */
    public function getFTDUsersList(){
        return $this->getFTDUsersList();
    }
}
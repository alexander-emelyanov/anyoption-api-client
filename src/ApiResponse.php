<?php

namespace AnyOption;

class ApiResponse
{
    CONST API_CODE_FIELD = 'apiCode';

    CONST API_CODE_G000 = 'G000';

    CONST API_CODE_DESCRIPTION_FIELD = 'apiCodeDescription';

    /**
     * @var string
     */
    protected $apiCode = '';

    /**
     * @var string
     */
    protected $apiCodeDescription = '';

    public function __construct(Payload $payload){
        $this->apiCode = $payload[static::API_CODE_FIELD];
        $this->apiCodeDescription = $payload[static::API_CODE_DESCRIPTION_FIELD];
    }

    public function isSuccess(){
        return ($this->apiCode == static::API_CODE_G000);
    }

    public function getApiCode(){
        return $this->apiCode;
    }

    public function getApiCodeDescription(){
        return $this->apiCodeDescription;
    }
}
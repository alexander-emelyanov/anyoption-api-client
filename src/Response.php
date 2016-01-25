<?php

namespace AnyOption;

class Response
{
    CONST FIELD_API_CODE = 'apiCode';

    CONST FIELD_API_CODE_DESCRIPTION = 'apiCodeDescription';

    CONST VALUE_API_CODE_G000 = 'G000';

    /**
     * @var string
     */
    protected $apiCode = '';

    /**
     * @var string
     */
    protected $apiCodeDescription = '';

    public function __construct(Payload $payload){
        $this->apiCode = $payload[static::FIELD_API_CODE];
        $this->apiCodeDescription = $payload[static::FIELD_API_CODE_DESCRIPTION];
    }

    public function isSuccess(){
        return ($this->apiCode == static::VALUE_API_CODE_G000);
    }

    public function getApiCode(){
        return $this->apiCode;
    }

    public function getApiCodeDescription(){
        return $this->apiCodeDescription;
    }
}
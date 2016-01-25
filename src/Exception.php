<?php

namespace AnyOption;

class Exception extends \Exception
{
    private $apiResponse = null;

    public function __construct(ApiResponse $apiResponse, $message = '', $code = 0, \Exception $previous = null){
        $exception = parent::__construct($message, $code, $previous);
        $this->apiResponse = $apiResponse;
        return $exception;
    }
}
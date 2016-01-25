<?php

namespace AnyOption;

class Exception extends \Exception
{
    /**
     * @var \AnyOption\Response
     */
    private $response = null;

    public function __construct(Response $response, $message = '', $code = 0, \Exception $previous = null){
        $exception = parent::__construct($message, $code, $previous);
        $this->response = $response;
        return $exception;
    }

    /**
     * @return \AnyOption\Response
     */
    public function getResponse(){
       return $this->apiResponse;
    }
}
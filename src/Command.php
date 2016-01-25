<?php

namespace AnyOption;

abstract class Command
{
    protected $parameters = [];

    public function __construct($parameters = []){
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getParameters(){
        return $this->parameters;
    }

    abstract public static function getUri();

    /**
     * Returned array is a tree. The leafs of this tree is a AnyOption\Parameter objects.
     * @return array
     */
    abstract public static function metadata();

    /**
     * @param \AnyOption\Payload $payload
     * @return \AnyOption\Response
     */
    abstract public static function getResponse(Payload $payload);
}
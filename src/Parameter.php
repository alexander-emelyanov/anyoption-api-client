<?php

namespace AnyOption;

class Parameter
{
    protected $name;

    protected $preprocessors = [];

    protected $validators = [];

    public function __construct($name, $preprocessors, $validators){
        $this->name = $name;
        $this->preprocessors = $preprocessors;
        $this->validators;
    }

    public function getName(){
        return $this->name;
    }

    public function getPreprocessors(){
        return $this->preprocessors;
    }

    public function getValidators(){
        return $this->validators;
    }
}
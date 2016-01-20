<?php

namespace AnyOption\Commands;

use AnyOption\Command;
use AnyOption\Parameter;

class InsertUser extends  Command
{

    public static function getUri(){
        return 'insertUser';
    }

    public static function metadata(){
        return [
            'locale' => new Parameter('locale', [], []),
            'utcOffset' => new Parameter('utcOffset', [], []),
            'apiUser' => [
                new Parameter('userName', [], []),
                new Parameter('password', [], []),
                ],
            'register' => [
                new Parameter('firstName', [], []),
                new Parameter('lastName', [], []),
                new Parameter('email', [], []),
                new Parameter('mobilePhone', [], []),
                new Parameter('countryName', [], []),
                new Parameter('password', [], []),
                new Parameter('password2', [], []),
                new Parameter('ip', [], []),
                new Parameter('terms', [], []),
                new Parameter('dynamicParam', [], []),
            ],
        ];
    }
}
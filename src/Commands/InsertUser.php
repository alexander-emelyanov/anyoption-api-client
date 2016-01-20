<?php

namespace AnyOption\Commands;

use AnyOption\Parameter;

class InsertUser
{
    CONST URI = 'insertUser';

    public static function parameters(){
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
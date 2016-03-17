<?php

namespace AnyOption\Commands;

use AnyOption\Command;
use AnyOption\Parameter;
use AnyOption\Payload;

class GetUserDetails extends Command
{
    public function getUri()
    {
        return 'getUserDetails';
    }

    public function metadata()
    {
        return [
            'locale'   => new Parameter('locale', [], []),
            'userName' => new Parameter('userName', [], []),
            'password' => new Parameter('password', [], []),
            'apiUser'  => [
                new Parameter('userName', [], []),
                new Parameter('password', [], []),
            ],
        ];
    }

    /**
     * @param Payload $payload
     *
     * @return \AnyOption\Responses\InsertUser
     */
    public function getResponse(Payload $payload)
    {
        return new \AnyOption\Responses\GetUserDetails($payload);
    }
}

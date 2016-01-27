<?php

namespace AnyOption\Commands;

use AnyOption\Command;
use AnyOption\Parameter;
use AnyOption\Payload;

class GetFTDUsersByDate extends Command
{
    public function getUri(){
        return 'getFTDUsersByDate';
    }

    public function metadata(){
        return [
            'locale' => new Parameter('locale', [], []),
            'dateRequest' => new Parameter('dateRequest', [], []),
            'apiUser' => [
                new Parameter('userName', [], []),
                new Parameter('password', [], []),
            ],
        ];
    }

    /**
     * @param Payload $payload
     * @return \AnyOption\Responses\GetFTDUsersByDate
     */
    public function getResponse(Payload $payload){
        return new \AnyOption\Responses\GetFTDUsersByDate($payload);
    }
}
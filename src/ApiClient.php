<?php

namespace AnyOption;

use GuzzleHttp;

class ApiClient
{
    protected $baseUrl = 'http://api.testenv.anyoption.com/api_gateway/services/';

    /**
     * @var GuzzleHttp\ClientInterface A Guzzle HTTP client.
     */
    protected $httpClient;

    public function call($command){

    }


}
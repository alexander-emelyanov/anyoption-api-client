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

    /**
     * @param \AnyOption\Command $command
     * @return bool
     */
    public function call(Command $command){

        $requestData = $command->getParameters();

        $uri = $this->baseUrl . $command->getUri();

        $this->httpClient->request('GET', $uri, [json_encode($requestData)]);

        var_dump($requestData);

        return true;
    }


}
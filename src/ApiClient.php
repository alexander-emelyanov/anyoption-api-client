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
     * @param GuzzleHttp\ClientInterface|null $httpClient
     */
    public function __construct(GuzzleHttp\ClientInterface $httpClient = null){
        $this->httpClient = $httpClient ?: new GuzzleHttp\Client();
    }

    /**
     * @param \AnyOption\Command $command
     * @return bool
     * @throws \AnyOption\Exception
     */
    public function call(Command $command){

        $requestData = $command->getParameters();

        $uri = $this->baseUrl . $command->getUri();

        $serverResponse = $this->httpClient->request('POST', $uri, [json_encode($requestData)]);

        // Read a body contents
        $contents = $serverResponse->getBody()->getContents();

        // Parse raw body contents into Payload object.
        $payload = Payload::fromJson($contents);

        // Load data from parsed object into ApiResponse object.
        $apiResponse = new ApiResponse($payload);

        if (!$apiResponse->isSuccess()){
            throw new Exception($apiResponse, $apiResponse->getApiCodeDescription());
        }

        return $apiResponse;
    }


}
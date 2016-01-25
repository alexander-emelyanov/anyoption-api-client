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
     * @return \AnyOption\Response
     * @throws \AnyOption\Exception
     */
    public function call(Command $command){

        $uri = $this->baseUrl . $command->getUri();

        $requestData = $command->getParameters();

        $serverResponse = $this->httpClient->request('POST', $uri, ['body' => json_encode($requestData)]);

        // Read a body contents
        $contents = $serverResponse->getBody()->getContents();

        // Parse raw body contents into Payload object.
        $payload = Payload::fromJson($contents);

        // Load data from parsed object into Response object.
        $response = $command->getResponse($payload);

        if (!$response->isSuccess()){
            throw new Exception($response, $response->getApiCode() . ": " . $response->getApiCodeDescription());
        }

        return $response;
    }


}
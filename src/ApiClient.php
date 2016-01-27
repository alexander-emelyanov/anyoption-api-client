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
     * Array with parameters. These parameter will be used for each request to server.
     * You can override parameter of ApiClient over Command parameters.
     * @var array
     */
    protected $parameters = [];

    /**
     * @param array $parameters
     * @param GuzzleHttp\ClientInterface|null $httpClient
     */
    public function __construct($parameters = [], GuzzleHttp\ClientInterface $httpClient = null){
        $this->configure($parameters);
        $this->httpClient = $httpClient ?: new GuzzleHttp\Client();
    }

    public function configure($parameters = []){
        if (is_array($parameters) && !empty($parameters)){
            $this->parameters = array_replace_recursive($this->parameters, $parameters);
        }
    }

    /**
     * @param \AnyOption\Command $command
     * @return \AnyOption\Response
     * @throws \AnyOption\Exception
     */
    public function call(Command $command){

        $uri = $this->baseUrl . $command->getUri();

        $requestData = array_replace_recursive($this->parameters, $command->getParameters());

        $serverResponse = $this->httpClient->request('POST', $uri, ['body' => json_encode($requestData)]);

        // Read a body contents
        $contents = $serverResponse->getBody()->getContents();

        // Parse raw body contents into Payload object.
        $payload = new Payload($contents);

        // Load data from parsed object into Response object.
        $response = $command->getResponse($payload);

        if (!$response->isSuccess()){
            throw new Exception($response, $response->getApiCode() . ": " . $response->getApiCodeDescription() . print_r($response->getUserMessages(), 1));
        }

        return $response;
    }


}
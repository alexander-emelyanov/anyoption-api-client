<?php

namespace AnyOption;

use GuzzleHttp;

class ApiClient
{

    /**
     * @var \GuzzleHttp\ClientInterface A Guzzle HTTP client.
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
     * @param \GuzzleHttp\ClientInterface|null $httpClient
     */
    public function __construct($parameters = [], GuzzleHttp\ClientInterface $httpClient = null){
        $this->configure($parameters);
        $this->httpClient = $httpClient ? : new GuzzleHttp\Client();
    }

    public function configure($parameters = []){
        if (is_array($parameters) && !empty($parameters)){
            $this->parameters = array_replace_recursive($this->parameters, $parameters);
        }
    }

    /**
     * Method returns URL mount point for AnyOption API.
     * @return mixed
     * @throws \Exception
     */
    public function getUrl(){
        if(!isset($this->parameters['url'])){
            throw new \Exception('Configuration is incomplete. Specify AnyOption URL.');
        }
        return $this->parameters['url'];
    }

    /**
     * Returns parameters that should be transferred with command's parameters.
     * @return array
     */
    public function getParameters(){
        $parameters = $this->parameters;
        unset($parameters['url']);
        return $parameters;
    }

    /**
     * @param \AnyOption\Command $command
     * @return \AnyOption\Response
     * @throws \AnyOption\Exception
     */
    public function call(Command $command){

        $uri = $this->getUrl() . $command->getUri();

        $requestData = array_replace_recursive($this->getParameters(), $command->getParameters());

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
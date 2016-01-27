<?php

namespace AnyOption\Tests;

use AnyOption\ApiClient;
use AnyOption\Response;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Faker\Generator A Faker fake data generator.
     */
    protected $faker;

    /**
     * @var \AnyOption\ApiClient An AnyOption API client.
     */
    protected $client;

    /**
     * Sets up a test with some useful objects.
     */
    public function setUp()
    {
        // Create faker instance for faking data
        $this->faker = \Faker\Factory::create();

        $this->client = new ApiClient([
            'apiUser' => [
                'userName' => getenv('ANYOPTION_USERNAME'),
                'password' => getenv('ANYOPTION_PASSWORD'),
            ],
        ]);
    }

    /**
     * Free resources
     */
    public function tearDown()
    {
    }

    protected function checkResponse(Response $response){
        if (!$response->isSuccess()){
            $msg = "Bad response. " . $response->getApiCode() . ": " . $response->getApiCodeDescription();
            throw new \Exception($msg . print_r($response->getUserMessages()));
        }
    }
}
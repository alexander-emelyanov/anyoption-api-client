<?php

namespace AnyOption\Tests;

class CommandsTest extends TestCase
{
    public function testInsertUser()
    {
        $password = substr(md5(rand()), 0, 8);

        $command = new \AnyOption\Commands\InsertUser([
            'utcOffset' => -180,
            'locale'    => 'en',
            'register'  => [
                'firstName'   => $this->faker->firstName,
                'lastName'    => $this->faker->lastName,
                'email'       => $this->faker->email,
                'mobilePhone' => $this->faker->randomNumber(8),
                'password'    => $password,
                'password2'   => $password,
                'countryName' => $this->getRandomCountryISOAlpha3(),
                'ip'          => '127.0.0.1',
                'terms'       => '',
            ],
        ]);

        try {
            $response = $this->client->call($command);
            $this->checkResponse($response);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            // AnyOption is a "very secured" platform. Only white-listed IPs are allowed...
        }
    }
}

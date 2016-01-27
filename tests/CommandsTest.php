<?php

namespace AnyOption\Tests;

class CommandsTest extends TestCase
{
    public function testInsertUser()
    {
        $password = $this->faker->password();

        $command = new \AnyOption\Commands\InsertUser([
            'utcOffset' => -180,
            'locale' => 'en',
            'register' => [
                'firstName' => $this->faker->firstName,
                'lastName' => $this->faker->lastName,
                'email' => $this->faker->email,
                'mobilePhone' => $this->faker->phoneNumber,
                'password' => $password,
                'password2' => $password,
                'countryName' => $this->faker->countryISOAlpha3,
                'ip' => $this->faker->ipv4,
                'terms' => '',
            ],
        ]);

        $response = $this->client->call($command);

        $this->checkResponse($response);
    }
}
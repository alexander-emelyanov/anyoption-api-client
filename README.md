AnyOption API Client
====
[![Build Status](https://travis-ci.org/alexander-emelyanov/anyoption-api-client.svg?branch=master)](https://travis-ci.org/alexander-emelyanov/anyoption-api-client) 
[![Code Climate](https://codeclimate.com/github/alexander-emelyanov/anyoption-api-client/badges/gpa.svg)](https://codeclimate.com/github/alexander-emelyanov/anyoption-api-client)

This repository contains PHP Client for AnyOption platform.

AnyOption is the world's first and largest trading platform for binary options, one touch options and dozens of other advanced derivatives.

## Installation
Install using [Composer](http://getcomposer.org), doubtless.

```sh
$ composer require alexander-emelyanov/anyoption-api-client
```

## Usage

First, you need to create a client object to connect to the AnyOption servers. You will need to acquire an API username and API password for your app first from AnyOption, then pass the credentials to the client object for logging in. 

```php
$client = new \AnyOption\ApiClient([
    'apiUser' => [
        'userName' => '<ANYOPTION_USERNAME>',
        'password' => '<ANYOPTION_PASSWORD>'
    ],
]);
```

Also your IP address must be added to whitelist of AnyOption platform. Feel free to contact me for more details.

Assuming your credentials is valid and your IP is whitelisted, you are good to go!

### Running tests

You can run unit tests via [PHPUnit](http://phpunit.de):

```sh
$ vendor/bin/phpunit tests
```

Note: you should install dev dependencies for this package using 

```sh
$ composer update --dev
```

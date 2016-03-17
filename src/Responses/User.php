<?php

namespace AnyOption\Responses;

use AnyOption\Payload;
use AnyOption\Response;

class User extends Response
{
    const FIELD_USER = 'user';

    /**
     * @var array
     */
    protected $user = [];

    /**
     * {@inheritdoc}
     */
    public function __construct(Payload $payload)
    {
        parent::__construct($payload);
        $this->user = isset($payload[static::FIELD_USER]) ? $payload[static::FIELD_USER] : [];
    }

    public function getUser()
    {
        return $this->user;
    }
}

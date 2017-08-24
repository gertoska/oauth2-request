<?php

namespace Gertoska\OAuth2Request;

use GuzzleHttp\Client;

/**
 * Class AbstractRequest
 * @package Gertoska\OAuth2Request
 */
abstract class AbstractRequest
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Api
     */
    private $api;


    /**
     * AbstractRequest constructor.
     */
    public function __construct()
    {
        $this->client = new Client();

        $this->api = new Api($this->client());
    }

    /**
     * @return Client
     */
    public function client()
    {
        return $this->client;
    }

    /**
     * @return Api
     */
    public function api()
    {
        return $this->api;
    }
}

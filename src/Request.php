<?php

namespace Gertoska\OAuth2Request;

use Gertoska\OAuth2Request\Credential\Credential;
use Gertoska\OAuth2Request\Credential\CredentialFactory;
use GuzzleHttp\Client;

/**
 * Class Request
 * @package Gertoska\OAuth2Request
 */
class Request
{
    /**
     * @var CredentialFactory
     */
    private $credentialFactory;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Credential
     */
    private $credential;

    /**
     * Request constructor.
     *
     * @param array $accessData
     */
    public function __construct(array $accessData)
    {
        $this->client = new Client();

        $this->credentialFactory = new CredentialFactory();
        $this->credential = $this->credentialFactory->buildFromArray($accessData);
    }

    /**
     * @return Credential
     */
    public function getOrRefreshAccessToken(): Credential
    {
        if ($this->credential->checkIfIsNotNecessaryToRefreshToken()) {
            return $this->credential;
        }

        $response = $this->client->request('post', $this->credential->uri() . '/oauth/token', [
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                'cache-control' => 'no-cache',
                'authorization' => 'Basic ' . $this->credential->authorization()
            ],
            'form_params' => [
                'grant_type' => $this->credential->grantType(),
                'username' => $this->credential->username(),
                'password' => $this->credential->password()
            ]
        ]);

        $response = json_decode((string)$response->getBody());

        return $this->credential->setOAuth(
            $response->access_token,
            $response->token_type,
            $response->refresh_token,
            $response->expires_in,
            $response->scope,
            microtime(true)
        );
    }

    
    /**
     * @param string $method
     * @param string $path
     * @param array|null $params
     * @param bool $body
     *
     * @return mixed
     */
    public function request(string $method, string $path, array $params = null, bool $body = true)
    {
        $response = $this->client->request($method, $this->credential->uri() . $path, [
            'headers' => [
                'cache-control' => 'no-cache',
                'authorization' => 'Bearer ' . $this->credential->accessToken()
            ],
            'json' => $params
        ]);

        if ($body) {
            return json_decode((string)$response->getBody());
        } else {
            return json_decode((string)$response->getStatusCode());
        }
    }
}

<?php

declare(strict_types = 1);

namespace Gertoska\OAuth2Request;

use Gertoska\OAuth2Request\Credential\Credential;
use Gertoska\OAuth2Request\Credential\CredentialFactory;
use GuzzleHttp\Client;

final class Request
{
    private $credentialFactory;
    private $client;
    private $credential;

    public function __construct(array $accessData)
    {
        $this->client = new Client();

        $this->credentialFactory = new CredentialFactory();
        $this->credential        = $this->credentialFactory->buildFromArray($accessData);
    }

    public function getOrRefreshAccessToken(): Credential
    {
        if ($this->credential->checkIfIsNotNecessaryToRefreshToken()) {
            return $this->credential;
        }

        $response = $this->client->request(
            'post',
            $this->credential->uri() . '/oauth/token',
            [
                'headers'     => [
                    'content-type'  => 'application/x-www-form-urlencoded',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Basic ' . $this->credential->authorization(),
                ],
                'form_params' => [
                    'grant_type' => $this->credential->grantType(),
                    'username'   => $this->credential->username(),
                    'password'   => $this->credential->password(),
                ],
            ]
        );

        $response = json_decode((string) $response->getBody());

        return $this->credential->setOAuth(
            $response->access_token,
            $response->token_type,
            $response->refresh_token,
            $response->expires_in,
            $response->scope,
            microtime(true)
        );
    }

    public function request(string $method, string $path, array $params = null, bool $body = true)
    {
        $response = $this->client->request(
            $method,
            $this->credential->uri() . $path,
            [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer ' . $this->credential->accessToken(),
                ],
                'json'    => $params,
            ]
        );

        if ($body) {
            return json_decode((string) $response->getBody());
        } else {
            return json_decode((string) $response->getStatusCode());
        }
    }

    public function bodyRequest(string $method, string $path, string $body)
    {
        $response = $this->client->request(
            $method,
            $this->credential->uri() . $path,
            [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer ' . $this->credential->accessToken(),
                ],
                'body'    => $body,
            ]
        );

        return json_decode((string) $response->getStatusCode());
    }
}

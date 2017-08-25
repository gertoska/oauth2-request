<?php

namespace Gertoska\OAuth2Request\Credential;

/**
 * Class CredencialFactory
 * @package Gertoska\OAuth2Request\Credential
 */
class CredentialFactory
{
    /**
     * @param array $params
     *
     * @return Credential
     */
    public function buildFromArray(array $params)
    {
        return $this->build(
            $params['uri'],
            $params['authorization'],
            $params['grantType'],
            $params['username'],
            $params['password'],
            isset($params['accessToken']) ? $params['accessToken'] : null,
            isset($params['tokenType']) ? $params['tokenType'] : null,
            isset($params['refreshToken']) ? $params['refreshToken'] : null,
            isset($params['expiresIn']) ? $params['expiresIn'] : null,
            isset($params['scope']) ? $params['scope'] : null,
            isset($params['obtainedIn']) ? $params['obtainedIn'] : null
        );
    }

    /**
     * @param string $uri
     * @param string $authorization
     * @param string $grantType
     * @param string $username
     * @param string $password
     * @param string|null $accessToken
     * @param string|null $tokenType
     * @param string|null $refreshToken
     * @param int|null $expiresIn
     * @param string|null $scope
     * @param int|null $obtainedIn
     *
     * @return Credential
     */
    private function build(
        string $uri,
        string $authorization,
        string $grantType,
        string $username,
        string $password,
        string $accessToken = null,
        string $tokenType = null,
        string $refreshToken = null,
        int $expiresIn = null,
        string $scope = null,
        int $obtainedIn = null
    ) {
        return new Credential(
            $uri,
            $authorization,
            $grantType,
            $username,
            $password,
            $accessToken,
            $tokenType,
            $refreshToken,
            $expiresIn,
            $scope,
            $obtainedIn
        );
    }
}

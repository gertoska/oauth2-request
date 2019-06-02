<?php

declare(strict_types = 1);

namespace Gertoska\OAuth2Request\Credential;

final class CredentialFactory
{
    public function buildFromArray(array $params): Credential
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
    ): Credential {
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

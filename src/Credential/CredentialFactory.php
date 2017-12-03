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
    public function buildFromArray(array $params): Credential
    {
        return new Credential(
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
}

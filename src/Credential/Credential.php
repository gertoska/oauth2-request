<?php

namespace Gertoska\OAuth2Request\Credential;

/**
 * Class Credential
 * @package Gertoska\OAuth2Request\Credential
 */
class Credential
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $authorization;

    /**
     * @var string
     */
    private $grantType;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string|null
     */
    private $accessToken;

    /**
     * @var string|null
     */
    private $tokenType;

    /**
     * @var string|null
     */
    private $refreshToken;

    /**
     * @var int|null
     */
    private $expiresIn;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var int|null
     */
    private $obtainedIn;

    /**
     * AccessData constructor.
     *
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
     */
    public function __construct(
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
        $this->uri = $uri;
        $this->authorization = $authorization;
        $this->grantType = $grantType;
        $this->username = $username;
        $this->password = $password;
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->refreshToken = $refreshToken;
        $this->expiresIn = $expiresIn;
        $this->scope = $scope;
        $this->obtainedIn = $obtainedIn;
    }

    /**
     * @return string
     */
    public function uri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function authorization()
    {
        return (base64_encode(base64_decode($this->authorization)) !== $this->authorization) ? base64_encode($this->authorization) : $this->authorization;
    }

    /**
     * @return string
     */
    public function grantType()
    {
        return $this->grantType;
    }

    /**
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function accessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string|null
     */
    public function tokenType()
    {
        return $this->tokenType;
    }

    /**
     * @return string|null
     */
    public function refreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @return int|null
     */
    public function expiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @return string|null
     */
    public function scope()
    {
        return $this->scope;
    }

    /**
     * @return int|null
     */
    public function obtainedIn()
    {
        return $this->obtainedIn;
    }

    /**
     * @param string $accessToken
     * @param string $tokenType
     * @param string $refreshToken
     * @param int $expiresIn
     * @param string $scope
     * @param int $obtainedIn
     *
     * @return Credential
     */
    public function setOAuth(
        string $accessToken,
        string $tokenType,
        string $refreshToken,
        int $expiresIn,
        string $scope,
        int $obtainedIn
    ) {
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->refreshToken = $refreshToken;
        $this->expiresIn = $expiresIn;
        $this->scope = $scope;
        $this->obtainedIn = $obtainedIn;

        return $this;
    }

    /**
     * @return bool
     */
    public function checkIfIsNotNecessaryToRefreshToken()
    {
        return null !== $this->accessToken() && !$this->hasExpired();
    }

    /**
     * @return bool
     */
    public function hasExpired()
    {
        return null === $this->expiresIn || microtime(true) - $this->obtainedIn >= $this->expiresIn;
    }
}

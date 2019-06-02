<?php

declare(strict_types = 1);

namespace Gertoska\OAuth2Request\Credential;

final class Credential
{
    private $uri;
    private $authorization;
    private $grantType;
    private $username;
    private $password;
    private $accessToken;
    private $tokenType;
    private $refreshToken;
    private $expiresIn;
    private $scope;
    private $obtainedIn;

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
        $this->uri           = $uri;
        $this->authorization = $authorization;
        $this->grantType     = $grantType;
        $this->username      = $username;
        $this->password      = $password;
        $this->accessToken   = $accessToken;
        $this->tokenType     = $tokenType;
        $this->refreshToken  = $refreshToken;
        $this->expiresIn     = $expiresIn;
        $this->scope         = $scope;
        $this->obtainedIn    = $obtainedIn;
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function authorization(): string
    {
        $auth = $this->authorization;

        return (base64_encode(base64_decode($auth)) !== $auth) ? base64_encode($auth) : $auth;
    }

    public function grantType(): string
    {
        return $this->grantType;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function accessToken(): ?string
    {
        return $this->accessToken;
    }

    public function tokenType(): ?string
    {
        return $this->tokenType;
    }

    public function refreshToken(): ?string
    {
        return $this->refreshToken;
    }

    public function expiresIn(): ?int
    {
        return $this->expiresIn;
    }

    public function scope(): ?string
    {
        return $this->scope;
    }

    public function obtainedIn(): ?int
    {
        return $this->obtainedIn;
    }

    public function setOAuth(
        string $accessToken,
        string $tokenType,
        string $refreshToken,
        int $expiresIn,
        string $scope,
        int $obtainedIn
    ): Credential {
        $this->accessToken  = $accessToken;
        $this->tokenType    = $tokenType;
        $this->refreshToken = $refreshToken;
        $this->expiresIn    = $expiresIn;
        $this->scope        = $scope;
        $this->obtainedIn   = $obtainedIn;

        return $this;
    }

    public function checkIfIsNotNecessaryToRefreshToken(): bool
    {
        return null !== $this->accessToken() && !$this->hasExpired();
    }

    public function hasExpired(): bool
    {
        return null === $this->expiresIn || microtime(true) - $this->obtainedIn >= $this->expiresIn;
    }
}

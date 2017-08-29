<?php

namespace Gertoska\OAuth2Request\Test;

use Gertoska\OAuth2Request\Credential\Credential;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class CredentialTest
 * @package Gertoska\OAuth2Request\Test
 */
class CredentialTest extends TestCase
{
    const URI = 'https://www.github.com';
    const AUTHORIZATION = 'WW91IGhhdmUgZGlzY292ZXJlZCB0aGUgc2VjcmV0IQ==';
    const GRANT_TYPE = 'password';
    const USERNAME = 'admin';
    const PASSWORD = '123456';
    const ACCESS_TOKEN = 'MY_4CC3SS_T0K3N';
    const TOKEN_TYPE = 'bearer';
    const REFRESH_TOKEN = 'MY_R3FR3S_T0K3N';
    const EXPIRES_IN = 80;
    const SCOPE = 'read write';
    const OBTAINED_IN = 1503934696;

    /**
     * @var Credential
     */
    private $credential;


    public function setUp()
    {
        $this->credential = new Credential(
            self::URI,
            self::AUTHORIZATION,
            self::GRANT_TYPE,
            self::USERNAME,
            self::PASSWORD,
            self::ACCESS_TOKEN,
            self::TOKEN_TYPE,
            self::REFRESH_TOKEN,
            self::EXPIRES_IN,
            self::SCOPE,
            self::OBTAINED_IN
        );
    }


    public function testUri()
    {
        $this->assertSame(self::URI, $this->credential->uri());
    }


    public function testAuthorization()
    {
        $this->assertSame(self::AUTHORIZATION, $this->credential->authorization());
    }


    public function testGrantType()
    {
        $this->assertSame(self::GRANT_TYPE, $this->credential->grantType());
    }


    public function testUsername()
    {
        $this->assertSame(self::USERNAME, $this->credential->username());
    }


    public function testPassword()
    {
        $this->assertSame(self::PASSWORD, $this->credential->password());
    }


    public function testAccessToken()
    {
        $this->assertSame(self::ACCESS_TOKEN, $this->credential->accessToken());
    }


    public function testTokenType()
    {
        $this->assertSame(self::TOKEN_TYPE, $this->credential->tokenType());
    }


    public function testRefreshToken()
    {
        $this->assertSame(self::REFRESH_TOKEN, $this->credential->refreshToken());
    }


    public function testExpiresIn()
    {
        $this->assertSame(self::EXPIRES_IN, $this->credential->expiresIn());
    }


    public function testScope()
    {
        $this->assertSame(self::SCOPE, $this->credential->scope());
    }


    public function testObtainedIn()
    {
        $this->assertSame(self::OBTAINED_IN, $this->credential->obtainedIn());
    }


    public function testSetOAuth()
    {
        $this->assertSame($this->credential, $this->credential->setOAuth(
            self::ACCESS_TOKEN,
            self::TOKEN_TYPE,
            self::REFRESH_TOKEN,
            self::EXPIRES_IN,
            self::SCOPE,
            self::OBTAINED_IN
        ));
    }


    public function testFalseCheckIfIsNotNecessaryToRefreshToken()
    {
        $this->assertSame(false, $this->credential->checkIfIsNotNecessaryToRefreshToken());
    }


    public function testTrueCheckIfIsNotNecessaryToRefreshToken1()
    {
        $credential = new Credential(
            self::URI,
            self::AUTHORIZATION,
            self::GRANT_TYPE,
            self::USERNAME,
            self::PASSWORD,
            null,
            self::TOKEN_TYPE,
            self::REFRESH_TOKEN,
            self::EXPIRES_IN,
            self::SCOPE,
            self::OBTAINED_IN
        );

        $this->assertSame(false, $credential->checkIfIsNotNecessaryToRefreshToken());
    }
}

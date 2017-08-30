<?php

namespace Gertoska\OAuth2Request\Test;

use Gertoska\OAuth2Request\Credential\Credential;
use Gertoska\OAuth2Request\Credential\CredentialFactory;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class CredentialTest
 * @package Gertoska\OAuth2Request\Test
 */
class CredentialFactoryTest extends TestCase
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
    const OBTAINED_IN = '1503934696';


    public function testBuildFromMinimalArray()
    {
        $credentialFactory = new CredentialFactory();
        $myArray = [
            'uri' => self::URI,
            'authorization' => self::AUTHORIZATION,
            'grantType' => self::GRANT_TYPE,
            'username' => self::USERNAME,
            'password' => self::PASSWORD
        ];

        $this->assertInstanceOf(Credential::class, $credentialFactory->buildFromArray($myArray));
    }

    public function testBuildFromCompleteArray()
    {
        $credentialFactory = new CredentialFactory();
        $myArray = [
            'uri' => self::URI,
            'authorization' => self::AUTHORIZATION,
            'grantType' => self::GRANT_TYPE,
            'username' => self::USERNAME,
            'password' => self::PASSWORD,
            'accessToken' => self::ACCESS_TOKEN,
            'tokenType' => self::TOKEN_TYPE,
            'refreshToken' => self::REFRESH_TOKEN,
            'expiresIn' => self::EXPIRES_IN,
            'scope' => self::SCOPE,
            'obtainedIn' => self::OBTAINED_IN
        ];

        $this->assertInstanceOf(Credential::class, $credentialFactory->buildFromArray($myArray));
    }
}

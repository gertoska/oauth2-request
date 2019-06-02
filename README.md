# OAuth2 Request

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Package to make requests with OAuth2 authentication, developed for private projects.

## Install

Via Composer

``` bash
$ composer require gertoska/oauth2-request
```

## Usage

``` php
$api = new Request($accessData);
$api->getOrRefreshAccessToken();

$api->request($method, $path, $params);
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gertoska/oauth2-request.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gertoska/oauth2-request/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gertoska/oauth2-request.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gertoska/oauth2-request.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gertoska/oauth2-request.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gertoska/oauth2-request
[link-travis]: https://travis-ci.org/gertoska/oauth2-request
[link-scrutinizer]: https://scrutinizer-ci.com/g/gertoska/oauth2-request/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gertoska/oauth2-request
[link-downloads]: https://packagist.org/packages/gertoska/oauth2-request
[link-author]: https://github.com/gertoska
[link-contributors]: ../../contributors

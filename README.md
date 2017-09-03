# OAuth2 Request

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require gertoska/oauth2-request
```

## Usage

``` php
$skeleton = new Gertoska\ConnectOauth2();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Contributions are **welcome** and will be fully **credited**.

## Security

If you discover any security related issues, please email tosk1@protonmail.com instead of using the issue tracker.

## Credits

- [Ger Toska][link-author]
- [All Contributors][link-contributors]

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

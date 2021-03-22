# a20-zero-api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sashalenz/a20-zero-api.svg?style=flat-square)](https://packagist.org/packages/sashalenz/a20-zero-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/sashalenz/a20-zero-api/run-tests?label=tests)](https://github.com/sashalenz/a20-zero-api/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/sashalenz/a20-zero-api/Check%20&%20fix%20styling?label=code%20style)](https://github.com/sashalenz/a20-zero-api/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/sashalenz/a20-zero-api.svg?style=flat-square)](https://packagist.org/packages/sashalenz/a20-zero-api)

## Installation

You can install the package via composer:

```bash
composer require sashalenz/a20-zero-api
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Sashalenz\Zero\ZeroServiceProvider" --tag="a20-zero-api-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$zero = new Sashalenz\Zero();
echo $zero->echoPhrase('Hello, Sashalenz!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oleksandr Petrovskyi](https://github.com/sashalenz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

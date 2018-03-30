# log
[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![Coverage Status](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/log?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Log message and determine level**
> This package contain implementations of the [PSR-3 logger interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md)

## Features
* Manage log level, location and duration

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/log dev-master
```

## Usage

#### `Seeren\Log\Daily`

Log message in a Daily generated file with optional slug and data
```php
$message = (new Daily)
->log("info", "{user} is logged", [
    "user" => "Bob"
]);
```

#### `Seeren\Log\LogLevel`

Determine psr-3 action to call for predefined constant error.
```php
$message = (new Monthly)
->{(new LogLevel)->level(E_USER_ERROR)}("{user} is logged", [
    "user" => "Bob"
]);
```

## Run tests

Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enable and [OPcache](http://php.net/manual/fr/book.opcache.php) disable
```
./vendor/bin/phpunit
```
## Run Coverage

Run [coveralls](https://coveralls.io/)
```
./vendor/bin/php-coveralls -v
```

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.
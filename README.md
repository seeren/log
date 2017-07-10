# log
[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![Coverage Status](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/log?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Log message and determine level**
> This package contain implementations of the [PSR-3 logger interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md)

## Features
* Manage log location and  duration

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/log dev-master
```

## Log Usage

#### `Seeren\Log\Daily`
Loggers handle log messages in a file, the file location is by default in a "log" directory of the root project directory, but his location can be specified at construction.  Different duration for a log location can be used choosing Daily, Monthly or Yeardly

```php
$message = (new Daily)->log(
    "info",
    "{user} is logged",
    ["user" => "Bob"]);
```

## Log Level Usage

#### `Seeren\Log\LogLevel`
LogLevel determine level corresponding to a predefined constant error. He can be used with a logger for determine a method to call, very helpfull for log errors
```php
$message = (new Daily)
->{(new LogLevel)->level(E_USER_ERROR)}(
    "{user} is logged",
    ["user" => "Bob");
```

## Run Unit tests
Install dependencies
```
composer update
```
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enabled and [OPcache](http://php.net/manual/fr/book.opcache.php) disabled for coverage
```
./vendor/bin/phpunit
```
## Run Coverage
Install dependencies
```
composer update
```
Run [coveralls](https://coveralls.io/) for check coverage
```
./vendor/bin/coveralls -v
```

##  Contributors
* **Cyril Ichti** - *Initial work* - [seeren](https://github.com/seeren)

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.
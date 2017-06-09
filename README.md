# log
[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![Coverage Status](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/log?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade)

Log message and determine level. Providing psr-3 implementation, `Seeren\Log` require `Psr\Log`

## Features
* [Psr-3](http://www.php-fig.org/psr/psr-3/) implementation
* Manage log location
* Choose log  duration

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/log dev-master
```

## Log Usage

#### `Seeren\Log\Logger`
`Seeren\Log\Logger` handle logs message, you can extends this class for customize log storage.
The log file location is by default in a log directory in the root project, but he can be specified at construction
```php
new Logger(__DIR__);
```
Log return the message
```php
$message = (new Logger)->log(
    "info",
    "{user} is logged",
    ["user" => "Bob"]);
```
Different duration for a log location can be used choosing Daily, Monthly or Yeardly

## Log Level Usage

#### `Seeren\Log\LogLevel`
LogLevel determine level corresponding to a predefined constant error
```php
$level = (new LogLevel)->level(E_USER_ERROR);
```
He can be used with a logger for determine a method to call
```php
$message = (new Daily)->{(new LogLevel)->level(E_USER_ERROR)}(
    "info",
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
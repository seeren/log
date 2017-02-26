[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/log/master/LICENSE) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats)

# Seeren\Log\

Log message and determine level for errors.
This package contains classes and interface for log with level. Interfaces and classes provid psr-3 implementation and require Psr\Log.

## Seeren\Log\Logger
```php
$logger = new Logger();
$logger->log("info", "{user} is logged", ["user" => "Bob"]);
$logger->{"error"}("Error {line}", ["line" => 9]));
```
Log directory correspond to a log directory in a root project but he can be specified in constructor.
```php
$logger = new Logger(__DIR__);
```
You can use different duration for a log file using Daily, Monthly or Yeardly who use a file per day, month or year.
```php
new Daily;
new Monthly;
new Yeardly;
```

## Seeren\Log\LogLevel
LogLevel provide method for get level corresponding to a predefined constant error.
```php
$level = (new LogLevel())->level(E_USER_ERROR);
```

## Installation
Require this package with composer
```
composer require seeren/log dev-master
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **Cyril Ichti** - [www.seeren.fr](http://www.seeren.fr)

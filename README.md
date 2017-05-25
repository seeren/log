[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/log/master/LICENSE) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats)

# log
Log message and determine level for errors. Providing psr-3 implementation this package require Psr\Log.

## Seeren\Log\Logger
```php
(new Logger())->log(
    "info",
    "{user} is logged",
    ["user" => "Bob"]);
```
Log directory correspond to a log directory in a root project but he can be specified in the constructor.
```php
new Logger(__DIR__);
```
Different duration for a log file can be used choosing Daily, Monthly or Yeardly.
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

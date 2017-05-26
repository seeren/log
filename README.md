# log
[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![Coverage Status](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/log?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade)  [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats)

Log message and determine level. Providing psr-3 implementation, `Seeren\Log` require `Psr\Log`.

## Seeren\Log\Logger
Log directory correspond to a log directory in a root project but he can be specified in the constructor.
```php
new Logger(__DIR__);
```
Levels and log method provide context replacement.
```php
(new Logger())->log(
    "info",
    "{user} is logged",
    ["user" => "Bob"]);
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

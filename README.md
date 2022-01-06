# Seeren\Log

[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![Coverage Status](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/log?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

Log message and determine level

___

## Installation

Seeren\Log is a [PSR-3 logger interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md) implementation

```
composer require seeren/log
```

___

## Seeren\Log\Logger\Daily

Log message in a `Daily`, `Monthly` or `Yearly` generated file with optional data slug

```php
use Seeren\Log\Logger\Daily;

$logger = new Daily();
```

By default, log folder is in `/var/log`

```bash
project/
└─ var/
   └─ log/
```

Log directory can be specified at construction

```php
use Seeren\Log\Logger\Daily;

$logger = new Daily('/log');
```

Log using levels

```php
use Seeren\Log\Logger\Daily;

$logger = new Daily();
$logger->log('info', 'Bob is logged');
```

Pass slug and context optionnaly

```php
use Seeren\Log\Logger\Daily;

$logger = new Daily();
$logger->log(
    'error',
    'Something happen: {message}',
    ['message' => 'Dummy message']
);
```

___

## Seeren\Log\Level

Determine `PSR-3` action with `Level` from a constant error code

```php
use Seeren\Log\LevelResolver;

$level = new LevelResolver();
$logLevel = $level->level(E_USER_ERROR);
```

___

## License
This project is licensed under the MIT License

# Seeren\\Log

[![Build](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log)
[![Require](https://poser.pugx.org/seeren/log/require/php)](https://packagist.org/packages/seeren/log)
[![Coverage](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master)
[![Download](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats)
[![Codacy](https://app.codacy.com/project/badge/Grade/baea2fa9ba704a80a6b693921af25cbd)](https://www.codacy.com/gh/seeren/log/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade)
[![Version](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log)

Log message with time scale for standard levels

* * *

## Installation

Seeren\\Log is a [PSR-3 logger interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md) implementation

    composer require seeren/log

* * *

## Seeren\\Log\\Logger\\Daily

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

Project directory can be specified at construction

```php
use Seeren\Log\Logger\Daily;

$logger = new Daily('..');
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
$logger->log('error', 'Something happen: {message}', [
    'message' => 'Dummy message'
]);
```

* * *

## License

This project is licensed under the [MIT](./LICENSE) License

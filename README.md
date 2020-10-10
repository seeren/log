# Seeren\Log

[![Build Status](https://travis-ci.org/seeren/log.svg?branch=master)](https://travis-ci.org/seeren/log) [![Coverage Status](https://coveralls.io/repos/github/seeren/log/badge.svg?branch=master)](https://coveralls.io/github/seeren/log?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/log.svg)](https://packagist.org/packages/seeren/log/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/log?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/log&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/log.svg)](https://packagist.org/packages/seeren/log) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

Log message and determine level

___

## Installation

Seeren\Log is a [PSR-3 logger interfaces](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md) implementations.

```
composer require seeren/log
```

___

## Seeren\Log\Logger\Daily

Log message in a `Daily`, `Monthly` or `Yearly` generated file with optional data slug

```php
$logger = new Daily();
$logger->log("info", "Bob is logged");
$logger->log("error", "Something happe: {message}", [
    "message" => "Dummy message"
]);
```

___

## Seeren\Log\Level

Determine `PSR-3` action with `Level` from a constant error code.

```php
$level = new Level();
$action = $level->level(E_USER_ERROR);
```

___

## License
This project is licensed under the MIT License

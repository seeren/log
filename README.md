## Seeren\Log\

Log message and determine level for errors.
This package contains classes and interface for log with level. Interfaces and classes provid psr-3 implementation and require Psr\Log.

#### Code Example

Create logger and use log of different level. LogLevelInterface provide method for determine level off an error type.

### Seeren\Log\Logger

```php
/**
 * @see http://www.php-fig.org/psr/psr-3/
 */
 
use Seeren\Log\Logger;

$logger = new Logger();
$logger->log("info", "{user} is logged", ["user" => "Bob"]);
$logger->{"error"}("Error {line}", ["line" => 9]));
```

Log directory correspond to a log directory in a root project but he can be specified in constructor.

```php
$logger = new Logger("otherLogDirectory");
```
You can use different duration for a log file using Daily, Monthly or Yeardly who use a file per day, month or year.

```php
new Daily;
new Monthly;
new Yeardly;
```

### Seeren\Log\LogLevel

LogLevel provide method for get level corresponding to a predefined constant error.

```php
$logLevel = new LogLevel();
$level = $logLevel->level(E_USER_ERROR);
```

#### Running the tests

Running tests with phpunit in the test folder.
Seeren\Log\Test\LoggerTest extends Psr\Log\Test\LoggerInterfaceTest

```
$ phpunit seeren/src/log/test/LoggerTest.php
$ phpunit seeren/src/log/test/LogLevelTest.php
```

#### License

[MIT](https://github.com/Seeren/Seeren/blob/master/LICENSE)

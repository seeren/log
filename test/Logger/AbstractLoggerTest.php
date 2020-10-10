<?php

namespace Seeren\Log\Test\Logger;

use PHPUnit\Framework\TestCase;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;
use ReflectionClass;
use ReflectionException;
use Seeren\Log\Logger\AbstractLogger;

class AbstractLoggerTest extends TestCase
{

    /**
     * @return array[]
     *
     * @throws ReflectionException
     */
    public function includePath(): array
    {
        $property = $this->getReflection()->getParentClass()->getProperty('includePath');
        $property->setAccessible(true);
        return [
            [$property]
        ];
    }

    /**
     * @return array[]
     */
    public function levels(): array
    {
        return [
            [LogLevel::ALERT],
            [LogLevel::CRITICAL],
            [LogLevel::DEBUG],
            [LogLevel::EMERGENCY],
            [LogLevel::ERROR],
            [LogLevel::INFO],
            [LogLevel::NOTICE],
            [LogLevel::WARNING],
        ];
    }

    /**
     * @return ReflectionClass
     */
    private final function getReflection(): ReflectionClass
    {
        return new ReflectionClass(DummyAbstractLogger::class);
    }

    /**
     * @param array|null $args
     * @return object
     */
    private final function getMock(array $args = null): object
    {
        return $this->getReflection()->newInstance($args);
    }

    /**
     * @dataProvider levels
     * @covers       \Seeren\Log\Logger\AbstractLogger::__construct
     * @covers       \Seeren\Log\Logger\AbstractLogger::log
     * @covers       \Seeren\Log\Logger\AbstractLogger::alert
     * @covers       \Seeren\Log\Logger\AbstractLogger::critical
     * @covers       \Seeren\Log\Logger\AbstractLogger::debug
     * @covers       \Seeren\Log\Logger\AbstractLogger::emergency
     * @covers       \Seeren\Log\Logger\AbstractLogger::error
     * @covers       \Seeren\Log\Logger\AbstractLogger::info
     * @covers       \Seeren\Log\Logger\AbstractLogger::notice
     * @covers       \Seeren\Log\Logger\AbstractLogger::warning
     * @param $level
     */
    public function testLevels($level): void
    {
        $this->assertEquals(
            $this->getMock()->{$level}('    Dummy {foo} {bar}    ', [
                'foo' => 'test',
                'bar' => 'message'
            ]),
            strtoupper($level) . ': Dummy test message'
        );
    }

    /**
     * @covers       \Seeren\Log\Logger\AbstractLogger::__construct
     * @covers       \Seeren\Log\Logger\AbstractLogger::log
     */
    public function testLogException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getMock()->log("Dummy", [true]);
    }

    /**
     * @dataProvider includePath
     * @covers       \Seeren\Log\Logger\AbstractLogger
     * @param $property
     */
    public function testDefaultIncludePath($property): void
    {
        $this->assertEquals(
            $property->getValue($this->getReflection()->newInstance()),
            dirname(__FILE__, 5)
            . DIRECTORY_SEPARATOR
            . 'var'
            . DIRECTORY_SEPARATOR
            . 'log'
        );
    }

    /**
     * @dataProvider includePath
     * @covers       \Seeren\Log\Logger\AbstractLogger
     * @param $property
     */
    public function testIncludePath($property): void
    {
        $this->assertEquals(
            __DIR__,
            $property->getValue($this->getReflection()->newInstance(__DIR__))
        );
    }

}

class DummyAbstractLogger extends AbstractLogger
{

    protected function write(string $log, string $includePath): string
    {
        return $log;
    }

}

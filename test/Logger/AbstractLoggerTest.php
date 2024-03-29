<?php

namespace Seeren\Log\Test\Logger;

use PHPUnit\Framework\TestCase;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;
use ReflectionClass;
use Seeren\Log\Logger\AbstractLogger;

class AbstractLoggerTest extends TestCase
{

    private function getReflection(): ReflectionClass
    {
        return new ReflectionClass(DummyAbstractLogger::class);
    }

    private function getMock(string $args = null): object
    {
        return $this->getReflection()->newInstance($args);
    }

    public function includePath(): array
    {
        $property = $this->getReflection()->getParentClass()->getProperty('includePath');
        $property->setAccessible(true);
        return [
            [$property]
        ];
    }

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
     */
    public function testLevels($level): void
    {
        $this->assertEquals(
            $this->getMock(__DIR__)->{$level}('    Dummy {foo} {bar}    ', [
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
        $this->getMock(__DIR__)->log('Dummy', 'Message');
    }

    /**
     * @dataProvider includePath
     * @covers       \Seeren\Log\Logger\AbstractLogger
     */
    public function testDefaultIncludePath($property): void
    {
        $this->assertEquals(
            $property->getValue($this->getReflection()->newInstance()),
            dirname(__FILE__, 6)
            . DIRECTORY_SEPARATOR
            . 'var'
            . DIRECTORY_SEPARATOR
            . 'log'
        );
    }

    /**
     * @dataProvider includePath
     * @covers       \Seeren\Log\Logger\AbstractLogger
     */
    public function testIncludePath($property): void
    {
        $this->assertEquals(
            __DIR__ . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'log',
            $property->getValue($this->getReflection()->newInstance(__DIR__))
        );
    }

}

class DummyAbstractLogger extends AbstractLogger
{

    protected function getFileName(): string
    {
        return 'dummy';
    }

    protected function getLogName(): string
    {
        return 'dummy';
    }

}

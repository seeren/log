<?php

namespace Seeren\Log\Test\Logger;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use Seeren\Log\Logger\Daily;
use Seeren\Log\Logger\Monthly;
use Seeren\Log\Logger\Yearly;

class LoggerTest extends TestCase
{

    /**
     * @return array[]
     */
    public function loggers(): array
    {
        return [
            [Daily::class, date("Y-m-d")],
            [Monthly::class, date("Y-m")],
            [Yearly::class, date("Y")],
        ];
    }

    /**
     * @dataProvider loggers
     * @covers       \Seeren\Log\Logger\AbstractLogger::__construct
     * @covers       \Seeren\Log\Logger\AbstractLogger::log
     * @covers       \Seeren\Log\Logger\Daily::write
     * @covers       \Seeren\Log\Logger\Monthly::write
     * @covers       \Seeren\Log\Logger\Yearly::write
     * @param string $className
     * @param string $date
     * @throws ReflectionException
     */
    public function testWrite(string $className, string $date): void
    {
        $includePath = __DIR__ . DIRECTORY_SEPARATOR . 'log';
        $mock = (new \ReflectionClass($className))->newInstance($includePath);
        $filename = $includePath . DIRECTORY_SEPARATOR . $date . '.log';
        $message = $mock->log('error', 'Dummy') . "\n";
        $contents = file_get_contents($filename);
        unlink($filename);
        $this->assertNotFalse(stripos($contents, $message));
    }

}

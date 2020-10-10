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
            [Daily::class, date("Y-m-d"), date("H:i:s")],
            [Monthly::class, date("Y-m"), date("d.H:i:s")],
            [Yearly::class, date("Y"), date("m-d.H:i:s")],
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
     * @param string $time
     * @throws ReflectionException
     */
    public function testWrite(string $className, string $date, string $time): void
    {
        $includePath = __DIR__ . DIRECTORY_SEPARATOR . 'log';
        $mock = (new \ReflectionClass($className))->newInstance($includePath);
        $filename = $includePath . DIRECTORY_SEPARATOR . $date . '.log';
        $message = '[' . $time . '] ' . $mock->log('error', 'Dummy') . "\n";
        $contents = file_get_contents($filename);
        unlink($filename);
        $this->assertEquals(trim($message), trim($contents));
    }

}

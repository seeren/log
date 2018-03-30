<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/log
 * @version 1.0.3
 */

namespace Seeren\Log\Test;

use Seeren\Log\LogLevel;
use Seeren\Log\LogLevelInterface;
use ReflectionClass;

/**
 * Class for test LogLevel
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 */
class LogLevelTest extends AbstractLogLevelTest
{

    /**
     * {@inheritDoc}
     * @see \Seeren\Log\Test\AbstractLogLevelTest::getLogLevel()
     */
    protected final function getLogLevel(): LogLevelInterface
    {
        return (new ReflectionClass(LogLevel::class))->newInstanceArgs([]);
    }

    /**
     * @covers \Seeren\Log\LogLevel::__construct
     */
    public function testImplements()
    {
        parent::testImplements();
    }

    /**
     * @covers \Seeren\Log\LogLevel::__construct
     * @covers \Seeren\Log\LogLevel::level
     * @covers \Seeren\Log\LogLevel::emergency
     * @covers \Seeren\Log\LogLevel::critical
     * @covers \Seeren\Log\LogLevel::error
     * @covers \Seeren\Log\LogLevel::warning
     * @covers \Seeren\Log\LogLevel::notice
     * @covers \Seeren\Log\LogLevel::info
     * @covers \Seeren\Log\LogLevel::debug
     */
    public function testLevel()
    {
        parent::testLevel();
    }

}

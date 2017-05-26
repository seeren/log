<?php

/**
 * This file contain Seeren\Log\Test\LogLevelTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
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
     * Get LogLevelInterface
     * 
     * @return LogLevelInterface log level
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
        parent::assertImplements();
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
        parent::assetLevel();
    }

}

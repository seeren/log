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
class LogLevelTest extends LogLevelInterfaceTest
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

}

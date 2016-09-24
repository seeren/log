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
 * @version 1.0.1
 */

namespace Seeren\Log\Test;

use Seeren\Log\LogLevel;
use ReflectionClass;

/**
 * Class for test LogLevel
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 * @final
 */
final class LogLevelTest extends LogLevelInterfaceTest
{

    /**
     * Get LogLevelInterface
     * 
     * @return LogLevelInterface log level
     */
    protected final function getLogLevel()
    {
        return (new ReflectionClass(LogLevel::class))->newInstanceArgs([]);
    }

}

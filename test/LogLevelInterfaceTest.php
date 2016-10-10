<?php

/**
 * This file contain Seeren\Log\Test\LogLevelInterfaceTest class
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

/**
 * Class for test LogLevelInterface
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 * @abstract
 */
abstract class LogLevelInterfaceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Get LogLevelInterface
     * 
     * @return LogLevelInterface log level
     */
    abstract protected function getLogLevel();

   /**
    * Test LogLevel::level
    */
   public final function testLevel()
   {
        $mock = $this->getLogLevel();
        $this->assertTrue(
            LogLevel::EMERGENCY === $mock->level(42000)
         && LogLevel::ALERT === $mock->level(0)
         && LogLevel::CRITICAL === $mock->level(E_ERROR)
         && LogLevel::ERROR === $mock->level(E_USER_ERROR)
         && LogLevel::WARNING === $mock->level(E_WARNING)
         && LogLevel::NOTICE === $mock->level(E_NOTICE)
         && LogLevel::INFO === $mock->level(E_STRICT)
         && LogLevel::DEBUG === $mock->level(E_DEPRECATED)
        );
   }

}

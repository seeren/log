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
 * @version 1.0.2
 */

namespace Seeren\Log\Test;

use Seeren\Log\LogLevel;
use Seeren\Log\LogLevelInterface;

/**
 * Class for test LogLevelInterface
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 * @abstract
 */
abstract class AbstractLogLevelTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Get LogLevelInterface
     * 
     * @return LogLevelInterface log level
     */
    abstract protected function getLogLevel(): LogLevelInterface;

    /**
     * Test implements
     */
    public function testImplements()
    {
        $this->assertInstanceOf(LogLevelInterface::class, $this->getLogLevel());
    }

   /**
    * Test level
    */
    public function testLevel()
   {
        $mock = $this->getLogLevel();
        $this->assertTrue(
            LogLevel::EMERGENCY === $mock->level(42000)
         && LogLevel::ALERT     === $mock->level(0)
         && LogLevel::ALERT     === $mock->level(123)
         && LogLevel::CRITICAL  === $mock->level(E_ERROR)
         && LogLevel::ERROR     === $mock->level(E_USER_ERROR)
         && LogLevel::WARNING   === $mock->level(E_WARNING)
         && LogLevel::NOTICE    === $mock->level(E_NOTICE)
         && LogLevel::INFO      === $mock->level(E_STRICT)
         && LogLevel::DEBUG     === $mock->level(E_DEPRECATED)
        );
   }

}

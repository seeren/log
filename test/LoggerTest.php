<?php

/**
 * This file contain Seeren\Log\Test\LoggerTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/log
 * @version 1.0.2
 */

namespace Seeren\Log\Test;

use Psr\Log\LoggerInterface;
use Seeren\Log\Logger;
use Psr\Log\LogLevel;
use ReflectionClass;

/**
 * Class for test Logger
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 */
class LoggerTest extends AbstractLoggerTest
{

   private
       /**
        * @var LoggerInterface logger
        */
       $logger;

   /**
    * Get logger
    * 
    * @return LoggerInterface
    */
   protected function getLogger(): LoggerInterface
   {       if (!$this->logger) {
           $this->logger = (new ReflectionClass(Logger::class))
                           ->newInstanceArgs([]);
       }
       return $this->logger;
   }

   /**
    * Get logs
    * 
    * @return string[]
    */
   protected function getLogs()
   {
       return $this->logger->getLogs();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    */
   public function testImplements()
   {
       parent::assertImplements();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::alert
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testAlert()
   {
        parent::assertLevels(LogLevel::ALERT);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::critical
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testCritical()
   {
        parent::assertLevels(LogLevel::CRITICAL);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::debug
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testDebug()
   {
        parent::assertLevels(LogLevel::DEBUG);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::emergency
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testEmergency()
   {
        parent::assertLevels(LogLevel::EMERGENCY);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::error
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testError()
   {
        parent::assertLevels(LogLevel::ERROR);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::info
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testInfo()
   {
        parent::assertLevels(LogLevel::INFO);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::notice
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testNotice()
   {
        parent::assertLevels(LogLevel::NOTICE);
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::warning
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testWarning()
   {
        parent::assertLevels(LogLevel::WARNING);
   }

   /**
    * @expectedException \Psr\Log\InvalidArgumentException
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    */
   public function testThrowsOnInvalidLevel()
   {
        parent::assertThrowsOnInvalidLevel();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextReplacement()
   {
        parent::assertContextReplacement();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextCanContainAnything()
   {
        parent::assertContextCanContainAnything();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextExceptionKeyCanBeExceptionOrOtherValues()
   {
        parent::assertContextCanContainAnything();
   }

}

<?php

/**
 * This file contain Seeren\Log\Test\DailyTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.1.1
 */

namespace Seeren\Log\Test;

use Psr\Log\LoggerInterface;
use Seeren\Log\Daily;
use Psr\Log\LogLevel;
use ReflectionClass;

/**
 * Class for test Daily
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 */
class DailyTest extends AbstractLoggerTest
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
   {
       if (!$this->logger) {
                  $this->logger = (
               new ReflectionClass(Daily::class)
           )->newInstanceArgs([
               __DIR__ . DIRECTORY_SEPARATOR . "log"
           ]);
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
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    */
   public function testImplements()
   {
       parent::assertImplements();
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::alert
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testAlert()
   {
        parent::assertLevels(LogLevel::ALERT);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::critical
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testCritical()
   {
        parent::assertLevels(LogLevel::CRITICAL);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::debug
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testDebug()
   {
        parent::assertLevels(LogLevel::DEBUG);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::emergency
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testEmergency()
   {
       parent::assertLevels(LogLevel::EMERGENCY);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::error
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testError()
   {
       parent::assertLevels(LogLevel::ERROR);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::info
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testInfo()
   {
       parent::assertLevels(LogLevel::INFO);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::notice
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testNotice()
   {
       parent::assertLevels(LogLevel::NOTICE);
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::warning
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Daily::getLogs
    */
   public function testWarning()
   {
       parent::assertLevels(LogLevel::WARNING);
   }

   /**
    * @expectedException \Psr\Log\InvalidArgumentException
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    */
   public function testThrowsOnInvalidLevel()
   {
       parent::assertThrowsOnInvalidLevel();
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextReplacement()
   {
        parent::assertContextReplacement();
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextCanContainAnything()
   {
        parent::assertContextCanContainAnything();
   }

   /**
    * @covers \Seeren\Log\Daily::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Daily::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextExceptionKeyCanBeExceptionOrOtherValues()
   {
        parent::assertContextCanContainAnything();
   }

}

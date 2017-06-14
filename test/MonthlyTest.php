<?php

/**
 * This file contain Seeren\Log\Test\MonthlyTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/log
 * @version 1.1.1
 */

namespace Seeren\Log\Test;

use Psr\Log\LoggerInterface;
use Seeren\Log\Monthly;
use Psr\Log\LogLevel;
use ReflectionClass;

/**
 * Class for test Monthly
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 */
class MonthlyTest extends AbstractLoggerTest
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
               new ReflectionClass(Monthly::class)
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
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    */
   public function testImplements()
   {
       parent::testImplements();
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::alert
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testAlert()
   {
        parent::assertLevels(LogLevel::ALERT);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::critical
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testCritical()
   {
        parent::assertLevels(LogLevel::CRITICAL);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::debug
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testDebug()
   {
        parent::assertLevels(LogLevel::DEBUG);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::emergency
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testEmergency()
   {
       parent::assertLevels(LogLevel::EMERGENCY);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::error
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testError()
   {
       parent::assertLevels(LogLevel::ERROR);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::info
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testInfo()
   {
       parent::assertLevels(LogLevel::INFO);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::notice
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testNotice()
   {
       parent::assertLevels(LogLevel::NOTICE);
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::warning
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Monthly::getLogs
    */
   public function testWarning()
   {
       parent::assertLevels(LogLevel::WARNING);
   }

   /**
    * @expectedException \Psr\Log\InvalidArgumentException
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    */
   public function testThrowsOnInvalidLevel()
   {
       parent::testThrowsOnInvalidLevel();
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextReplacement()
   {
        parent::testContextReplacement();
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextCanContainAnything()
   {
        parent::testContextCanContainAnything();
   }

   /**
    * @covers \Seeren\Log\Monthly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Monthly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextExceptionKeyCanBeExceptionOrOtherValues()
   {
        parent::testContextCanContainAnything();
   }

}

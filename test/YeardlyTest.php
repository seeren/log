<?php

/**
 * This file contain Seeren\Log\Test\YeardlyTest class
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
use Seeren\Log\Yeardly;
use Psr\Log\LogLevel;
use ReflectionClass;

/**
 * Class for test Yeardly
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 */
class YeardlyTest extends AbstractLoggerTest
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
               new ReflectionClass(Yeardly::class)
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
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    */
   public function testImplements()
   {
       parent::assertImplements();
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::alert
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testAlert()
   {
        parent::assertLevels(LogLevel::ALERT);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::critical
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testCritical()
   {
        parent::assertLevels(LogLevel::CRITICAL);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::debug
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testDebug()
   {
        parent::assertLevels(LogLevel::DEBUG);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::emergency
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testEmergency()
   {
       parent::assertLevels(LogLevel::EMERGENCY);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::error
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testError()
   {
       parent::assertLevels(LogLevel::ERROR);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::info
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testInfo()
   {
       parent::assertLevels(LogLevel::INFO);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::notice
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testNotice()
   {
       parent::assertLevels(LogLevel::NOTICE);
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::warning
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Yeardly::getLogs
    */
   public function testWarning()
   {
       parent::assertLevels(LogLevel::WARNING);
   }

   /**
    * @expectedException \Psr\Log\InvalidArgumentException
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    */
   public function testThrowsOnInvalidLevel()
   {
       parent::assertThrowsOnInvalidLevel();
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextReplacement()
   {
        parent::assertContextReplacement();
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextCanContainAnything()
   {
        parent::assertContextCanContainAnything();
   }

   /**
    * @covers \Seeren\Log\Yeardly::__construct
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Yeardly::log
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextExceptionKeyCanBeExceptionOrOtherValues()
   {
        parent::assertContextCanContainAnything();
   }

}

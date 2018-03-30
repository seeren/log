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
 * @version 2.0.1
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
    * {@inheritDoc}
    * @see \Seeren\Log\Test\AbstractLoggerTest::getLogger()
    */
   protected function getLogger(): LoggerInterface
   {       if (!$this->logger) {
           $this->logger = (new ReflectionClass(Logger::class))
                           ->newInstanceArgs([]);
       }
       return $this->logger;
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Log\Test\AbstractLoggerTest::getLogs()
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
       parent::testImplements();
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
        parent::testThrowsOnInvalidLevel();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextReplacement()
   {
        parent::testContextReplacement();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextCanContainAnything()
   {
        parent::testContextCanContainAnything();
   }

   /**
    * @covers \Seeren\Log\Logger::__construct
    * @covers \Seeren\Log\Logger::log
    * @covers \Seeren\Log\Logger::getLogs
    */
   public function testContextExceptionKeyCanBeExceptionOrOtherValues()
   {
        parent::testContextCanContainAnything();
   }

}

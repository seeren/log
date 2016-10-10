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
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Log\Test;

use Psr\Log\Test\LoggerInterfaceTest;
use Psr\Log\LoggerInterface;
use Seeren\Log\Logger;
use ReflectionClass;

/**
 * Class for test Logger
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 */
class LoggerTest extends LoggerInterfaceTest
{

   private
       /**
        * @var LoggerInterface logger
        */
       $logger;

   /**
    * @return LoggerInterface
    */
   public final function getLogger()
   {
       if (!$this->logger) {
           $this->logger = (new ReflectionClass(Logger::class))
                           ->newInstanceArgs([]);
       }
       return $this->logger;
   }

   /**
    * This must return the log messages in order.
    *
    * The simple formatting of the messages is: "<LOG LEVEL> <MESSAGE>".
    *
    * Example ->error('Foo') would yield "error Foo".
    *
    * @return string[]
    */
   public final function getLogs()
   {
       return $this->logger->getLogs();
   }

}

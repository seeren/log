<?php

/**
 * This file contain Seeren\Log\Logger class
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

namespace Seeren\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\InvalidArgumentException;

/**
 * Class for log
 * 
 * @category Seeren
 * @package Log
 */
class Logger implements LoggerInterface
{

   private
       /**
        * @var array log collection
        */
       $log;

   protected
       /**
        * @var string include path
        */
       $includePath;

   /**
    * Construct Logger
    * 
    * @param string $includePath include path
    * @return null
    */
   public function __construct(string $includePath = null)
   {
       $this->includePath = rtrim(
           (!$includePath
         ? (dirname(__FILE__, 5)) . DIRECTORY_SEPARATOR . "log"
         : $includePath), DIRECTORY_SEPARATOR
       ) . DIRECTORY_SEPARATOR;
       $this->log = [];
   }

   /**
    * Get logs
    * Implemented for pass Psr\Log\Test\LoggerInterfaceTest
    * 
    * @return array log collection
    */
   public final function getLogs()
   {
       return $this->log;
   }

   /**
    * System is unusable
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return string logged or not
    */
   public function emergency($message, array $context = []): string
   {
       return $this->log("emergency", $message, $context);
   }
    
   /**
    * Action must be taken immediately
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function alert($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * Critical conditions
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function critical($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * Runtime errors that do not require immediate action
    * 
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function error($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * Exceptional occurrences that are not errors
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function warning($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * Normal but significant events
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function notice($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }

   /**
    * Interesting events
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function info($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }

   /**
    * Detailed debug information
    *
    * @param string $message error message
    * @param array $context error context
    *
    * @return bool logged or not
    */
   public function debug($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }

   /**
    * Logs with an arbitrary level
    *
    * @param mixed  $level error level
    * @param string $message error message
    * @param array $context error context
    *
    * @return string log
    * 
    * @throws \InvalidArgumentException for invalid level
    */
   public function log($level, $message, array $context = []): string
   {
       if (!defined(LogLevel::class . "::" . strtoupper($level))) {
           throw new InvalidArgumentException(
               "Can't log: invalid level " . $level);
       }
       $body = $level . " " . trim($message);
       foreach ($context as $key => $value) {
           if (is_string($value)) {
               $body = str_replace("{" . $key . "}", $value, $body);
           }
       }
       $this->log[] = $body;
       return $body;
   }

}

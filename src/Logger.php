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
        * @var array
        */
       $log;

   protected
       /**
        * @var string
        */
       $includePath;

   /**
    * @param string $includePath
    * @return null
    */
   public function __construct(string $includePath = null)
   {
       $this->log = [];
       $this->includePath = rtrim((!$includePath
                          ? (dirname(__FILE__, 5)) . DIRECTORY_SEPARATOR . "log"
                          : $includePath), DIRECTORY_SEPARATOR)
                          . DIRECTORY_SEPARATOR;
   }

   /**
    * Implemented for Psr\Log\Test\LoggerInterfaceTest
    * 
    * @return array
    */
   public final function getLogs()
   {
       return $this->log;
   }

    /**
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::emergency()
     */
   public function emergency($message, array $context = []): string
   {
       return $this->log("emergency", $message, $context);
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::alert()
    */
   public function alert($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::critical()
    */
   public function critical($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::error()
    */
   public function error($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::warning()
    */
   public function warning($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }
    
   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::notice()
    */
   public function notice($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::info()
    */
   public function info($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::debug()
    */
   public function debug($message, array $context = []): string
   {
       return $this->log(__FUNCTION__, $message, $context);
   }

   /**
    * {@inheritDoc}
    * @see \Psr\Log\LoggerInterface::log()
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

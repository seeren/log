<?php

/**
 * This file contain Seeren\Log\LogLevel class
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

/**
 * Class for determine log level
 * 
 * @category Seeren
 * @package Log
 */
class LogLevel implements LogLevelInterface
{

   /**
    * Construct LogLevel
    * 
    * @return null
    */
   public function __construct()
   {
   }

   /**
    * Get error level
    * 
    * @param int $code error code
    * @return string error level
    */
   public final function level(int $code): string
   {
       switch ($code) {
           case 0:
               return self::ALERT;
           case $this->emergency($code):
               return self::EMERGENCY;
           case $this->critical($code): 
               return self::CRITICAL;
           case $this->error($code):
               return self::ERROR;
           case $this->warning($code):
               return self::WARNING;
           case $this->notice($code):
               return self::NOTICE;
           case $this->info($code):
               return self::INFO;
           case $this->debug($code):
               return self::DEBUG;
           default:
               return self::ALERT;
       }
   }

   /**
    * Is emergency
    * 
    * @param int $code error code
    * @return boolean emergency or not
    */
   protected function emergency($code): bool
   {
       return $code > E_USER_DEPRECATED; 
   }
    /**
    * Is critical
    *
    * @param int $code error code
    * @return boolean critical or not
    */
   protected function critical($code): bool
   {
       return $code === E_ERROR
           || $code === E_CORE_ERROR
           || $code === E_COMPILE_ERROR
           || $code === E_PARSE;
   }

   /**
    * Is error
    *
    * @param int $code error code
    * @return boolean error or not
    */
   protected function error($code): bool
   {
       return $code === E_USER_ERROR
           || $code === E_RECOVERABLE_ERROR;
   }

   /**
    * Is warning
    *
    * @param int $code error code
    * @return boolean warning or not
    */
   protected function warning($code): bool
   {
       return $code === E_WARNING
           || $code === E_CORE_WARNING
           || $code === E_COMPILE_WARNING
           || $code === E_USER_WARNING;
   }

   /**
    * Is notice
    *
    * @param int $code error code
    * @return boolean notice or not
    */
   protected function notice($code): bool
   {
       return $code === E_NOTICE
           || $code === E_USER_NOTICE;
   }

   /**
    * Is info
    *
    * @param int $code error code
    * @return boolean info or not
    */
   protected function info($code): bool
   {
       return $code === E_STRICT;
   }

   /**
    * Is debug
    *
    * @param int $code error code
    * @return boolean debug or not
    */
   protected function debug($code): bool
   {
       return $code === E_DEPRECATED
           || $code === E_USER_DEPRECATED;
   }

}

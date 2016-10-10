<?php

/**
 * This file contain Seeren\Log\Yeardly class
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
 * Class for yeardly log
 * 
 * @category Seeren
 * @package Log
 */
class Yeardly extends Logger
{

   /**
    * Construct Yeardly
    * 
    * @param string $includePath include path
    * @return null
    */
   public function __construct(string $includePath = null)
   {
       parent::__construct($includePath);
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
    * @throws InvalidArgumentException for invalid level
    */
   public final function log($level, $message, array $context = []): string
   {
       $body = parent::log($level, $message, $context);
       if (($file = fopen($this->includePath . date("Y") . ".log", "ab"))) {
            fwrite($file, date("m-d:H-i-s ") . $body . "\n");
            fclose($file);
        }
       return $body;
   }

}

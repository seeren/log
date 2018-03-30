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

/**
 * Class for yeardly log
 * 
 * @category Seeren
 * @package Log
 */
class Yeardly extends Logger
{

   /**
    * @param string $includePath
    */
   public function __construct(string $includePath = null)
   {
       parent::__construct($includePath);
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Log\Logger::log()
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

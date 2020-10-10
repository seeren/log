<?php

namespace Seeren\Log;

/**
 * Class for yearly logs
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log
 */
class Yeardly extends Logger
{

   /**
    * {@inheritDoc}
    * @see Logger::log()
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

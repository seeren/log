<?php

namespace Seeren\Log;

/**
 * Class for monthly log
 * 
 * @category Seeren
 * @package Log
 */
class Monthly extends Logger
{

   /**
    * {@inheritDoc}
    * @see Logger::log()
    */
   public final function log($level, $message, array $context = []): string
   {
       $body = parent::log($level, $message, $context);
       if (($file = fopen($this->includePath . date("Y-m") . ".log", "ab"))) {
            fwrite($file, date("d:H-i-s ") . $body . "\n");
            fclose($file);
        }
       return $body;
   }

}

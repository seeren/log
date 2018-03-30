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
 * Interface for determine error level
 * 
 * @category Seeren
 * @package Log
 */
interface LogLevelInterface
{

    const

        /**
         * @var string
         */
        EMERGENCY = "emergency",

        /**
         * @var string
         */
        ALERT     = "alert",

        /**
         * @var string
         */
        CRITICAL  = "critical",

        /**
         * @var string
         */
        ERROR     = "error",

        /**
         * @var string
         */
        WARNING   = "warning",

        /**
         * @var string
         */
        NOTICE    = "notice",

        /**
         * @var string
         */
        INFO      = "info",

        /**
         * @var string
         */
        DEBUG     = "debug";

   /**
    * Get level
    * 
    * @param int $type
    * @return string
    */
   public function level(int $type): string;

}

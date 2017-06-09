<?php

/**
 * This file contain Seeren\Log\LogLevelInterface interface
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
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
         * @var string log level
         */
        EMERGENCY = "emergency",
        /**
         * @var string log level
         */
        ALERT     = "alert",
        /**
         * @var string log level
         */
        CRITICAL  = "critical",
        /**
         * @var string log level
         */
        ERROR     = "error",
        /**
         * @var string log level
         */
        WARNING   = "warning",
        /**
         * @var string log level
         */
        NOTICE    = "notice",
        /**
         * @var string log level
         */
        INFO      = "info",
        /**
         * @var string log level
         */
        DEBUG     = "debug";

   /**
    * Get level
    * 
    * @param int $type error type
    * @return string log level
    */
   public function level(int $type): string;

}

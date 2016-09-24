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
 * @link http://www.seeren.fr/ Seeren
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

   /**
    * Get level
    * 
    * @param int $type error type
    * @return string log level
    */
   public function level(int $type): string;

}

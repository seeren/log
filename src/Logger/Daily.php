<?php

namespace Seeren\Log;

/**
 * Class for daily logs
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log
 */
class Daily extends Logger
{

    /**
     * {@inheritDoc}
     * @see Logger::log()
     */
    public final function log($level, $message, array $context = []): string
    {
        $body = parent::log($level, $message, $context);
        if (($file = fopen($this->includePath . date("Y-m-d") . ".log", "ab"))) {
            fwrite($file, date("H-i-s ") . $body . "\n");
            fclose($file);
        }
        return $body;
    }

}

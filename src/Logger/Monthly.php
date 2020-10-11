<?php

namespace Seeren\Log\Logger;

/**
 * Class to monthly logs
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log\Logger
 */
class Monthly extends AbstractLogger
{

    /**
     * {@inheritDoc}
     * @see AbstractLogger::write()
     */
    protected final function write(string $log, string $includePath): string
    {
        if (($file = fopen($includePath . DIRECTORY_SEPARATOR . date("Y-m") . ".log", "ab"))) {
            fwrite($file, '[' . date("d.H:i:s") . '] ' . $log . "\n");
            fclose($file);
        }
        return $log;
    }

}

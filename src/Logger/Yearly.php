<?php

namespace Seeren\Log\Logger;

/**
 * Class to yearly logs
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log\Logger
 */
class Yearly extends AbstractLogger
{

    /**
     * {@inheritDoc}
     * @see AbstractLogger::write()
     */
    protected final function write(string $log, string $includePath): string
    {
        if (($file = fopen($includePath . DIRECTORY_SEPARATOR . date("Y") . ".log", "ab"))) {
            fwrite($file, '[' . date("m-d.H:i:s") . '] ' . $log . "\n");
            fclose($file);
        }
        return $log;
    }

}

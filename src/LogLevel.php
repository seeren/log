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
 * Class for determine log level
 *
 * @category Seeren
 * @package Log
 */
class LogLevel implements LogLevelInterface
{

    /**
     * LogLevel
     */
    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Log\LogLevelInterface::level()
     */
    public final function level(int $code): string
    {
        switch ($code) {
            case 0: return self::ALERT;
            case $this->emergency($code): return self::EMERGENCY;
            case $this->critical($code): return self::CRITICAL;
            case $this->error($code): return self::ERROR;
            case $this->warning($code): return self::WARNING;
            case $this->notice($code): return self::NOTICE;
            case $this->info($code): return self::INFO;
            case $this->debug($code): return self::DEBUG;
            default: return self::ALERT;
        }
    }

    /**
     * @param int $code
     * @return boolean
     */
    protected function emergency($code): bool
    {
        return $code > E_USER_DEPRECATED;
    }

    /**
     * @param int $code
     * @return boolean critical
     */
    protected function critical($code): bool
    {
        return $code === E_ERROR || $code === E_CORE_ERROR || $code === E_COMPILE_ERROR || $code === E_PARSE;
    }

    /**
     * @param int $code
     * @return boolean
     */
    protected function error($code): bool
    {
        return $code === E_USER_ERROR || $code === E_RECOVERABLE_ERROR;
    }

    /**
     * @param int $code
     * @return boolean
     */
    protected function warning($code): bool
    {
        return $code === E_WARNING || $code === E_CORE_WARNING || $code === E_COMPILE_WARNING || $code === E_USER_WARNING;
    }

    /**
     * @param int $code
     * @return boolean
     */
    protected function notice($code): bool
    {
        return $code === E_NOTICE || $code === E_USER_NOTICE;
    }

    /**
     * @param int $code
     * @return boolean
     */
    protected function info($code): bool
    {
        return $code === E_STRICT;
    }

    /**
     * @param int $code
     * @return boolean
     */
    protected function debug($code): bool
    {
        return $code === E_DEPRECATED || $code === E_USER_DEPRECATED;
    }

}

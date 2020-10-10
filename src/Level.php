<?php

namespace Seeren\Log;

/**
 * Class for determine error level
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log
 */
class Level implements LevelInterface
{

    /**
     * {@inheritDoc}
     * @see LevelInterface::level()
     */
    public final function level(int $code): string
    {
        switch ($code) {
            case 0:
                return self::ALERT;
            case $this->emergency($code):
                return self::EMERGENCY;
            case $this->critical($code):
                return self::CRITICAL;
            case $this->error($code):
                return self::ERROR;
            case $this->warning($code):
                return self::WARNING;
            case $this->notice($code):
                return self::NOTICE;
            case $this->info($code):
                return self::INFO;
            case $this->debug($code):
                return self::DEBUG;
            default:
                return self::ALERT;
        }
    }

    /**
     * @param int $code
     * @return boolean
     */
    private function emergency(int $code): bool
    {
        return $code > E_USER_DEPRECATED;
    }

    /**
     * @param int $code
     * @return boolean critical
     */
    private function critical(int $code): bool
    {
        return $code === E_ERROR || $code === E_CORE_ERROR || $code === E_COMPILE_ERROR || $code === E_PARSE;
    }

    /**
     * @param int $code
     * @return boolean
     */
    private function error(int $code): bool
    {
        return $code === E_USER_ERROR || $code === E_RECOVERABLE_ERROR;
    }

    /**
     * @param int $code
     * @return boolean
     */
    private function warning(int $code): bool
    {
        return $code === E_WARNING || $code === E_CORE_WARNING || $code === E_COMPILE_WARNING || $code === E_USER_WARNING;
    }

    /**
     * @param int $code
     * @return boolean
     */
    private function notice(int $code): bool
    {
        return $code === E_NOTICE || $code === E_USER_NOTICE;
    }

    /**
     * @param int $code
     * @return boolean
     */
    private function info(int $code): bool
    {
        return $code === E_STRICT;
    }

    /**
     * @param int $code
     * @return boolean
     */
    private function debug(int $code): bool
    {
        return $code === E_DEPRECATED || $code === E_USER_DEPRECATED;
    }

}

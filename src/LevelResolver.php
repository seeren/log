<?php

namespace Seeren\Log;

use Psr\Log\LogLevel;

class LevelResolver implements LevelResolverInterface
{

    public final function getLevel(int $errorType): string
    {
        return match (true) {
            $errorType > E_USER_DEPRECATED => LogLevel::EMERGENCY,
            $errorType === E_ERROR
            || $errorType === E_CORE_ERROR
            || $errorType === E_COMPILE_ERROR
            || $errorType === E_PARSE => LogLevel::CRITICAL,
            $errorType === E_USER_ERROR
            || $errorType === E_RECOVERABLE_ERROR => LogLevel::ERROR,
            $errorType === E_WARNING
            || $errorType === E_CORE_WARNING
            || $errorType === E_COMPILE_WARNING
            || $errorType === E_USER_WARNING => LogLevel::WARNING,
            $errorType === E_NOTICE
            || $errorType === E_USER_NOTICE => LogLevel::NOTICE,
            $errorType === E_STRICT => LogLevel::INFO,
            $errorType === E_DEPRECATED
            || $errorType === E_USER_DEPRECATED => LogLevel::DEBUG,
            default => LogLevel::ALERT,
        };
    }

}

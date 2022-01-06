<?php

namespace Seeren\Log\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;

abstract class AbstractLogger implements LoggerInterface
{

    abstract protected function getFileName(): string;

    abstract protected function getLogName(): string;

    public function __construct(private string $includePath = '')
    {
        if (!$includePath) {
            $includePath = dirname(__FILE__, 6);
        }
        $separator = DIRECTORY_SEPARATOR;
        $this->includePath = rtrim("{$includePath}{$separator}var{$separator}log", $separator);
    }

    public final function emergency(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function alert(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function critical(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function error(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function warning(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function notice(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function info(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function debug(string|\Stringable $message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    public final function log($level, string|\Stringable $message, array $context = []): string
    {
        $constName = strtoupper($level);
        if (!is_string($level)
            || !defined(LogLevel::class . "::" . $constName)) {
            throw new InvalidArgumentException("Unknown level \"$level\"");
        }
        $message = trim($message);
        foreach ($context as $key => $value) {
            if (is_string($value)) {
                $message = str_replace('{' . $key . '}', trim($value), $message);
            }
        }
        $message = $constName . ': ' . $message;
        $file = fopen($this->includePath . DIRECTORY_SEPARATOR . $this->getFileName() . '.log', 'ab');
        fwrite($file, '[' . $this->getLogName() . '] ' . $message . PHP_EOL);
        fclose($file);
        return $message;
    }

}

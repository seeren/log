<?php

namespace Seeren\Log\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\InvalidArgumentException;
use Seeren\Log\Level;

/**
 * Class to Log
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log\Logger
 */
abstract class AbstractLogger implements LoggerInterface
{

    public $foo;
    /**
     * @var string
     */
    private string $includePath;

    /**
     * @param string $log
     * @param string $includePath
     * @return string
     */
    abstract protected function write(string $log, string $includePath): string;

    /**
     * @param string|null $includePath
     */
    public function __construct(string $includePath = null)
    {
        $this->includePath = rtrim(
            $includePath ?? dirname(__FILE__, 5)
            . DIRECTORY_SEPARATOR
            . 'var'
            . DIRECTORY_SEPARATOR
            . 'log',
            DIRECTORY_SEPARATOR
        );
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::emergency()
     */
    public function emergency($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::alert()
     */
    public function alert($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::critical()
     */
    public function critical($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::error()
     */
    public function error($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::warning()
     */
    public function warning($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::notice()
     */
    public function notice($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::info()
     */
    public function info($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::debug()
     */
    public function debug($message, array $context = []): string
    {
        return $this->log(__FUNCTION__, $message, $context);
    }

    /**
     * {@inheritDoc}
     * @see LoggerInterface::log()
     */
    public function log($level, $message, array $context = []): string
    {
        if (!defined(Level::class . "::" . strtoupper($level))) {
            throw new InvalidArgumentException('Unknown level "' . $level . '"');
        }
        foreach ($context as $key => $value) {
            if (is_string($value)) {
                $message = str_replace('{' . $key . '}', $value, $message);
            }
        }
        return $this->write(strtoupper($level) . ': ' . trim($message), $this->includePath);
    }

}

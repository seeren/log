<?php

/**
 * This file contain Seeren\Log\Test\LoggerInterfaceTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Log\Test;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Exception;

/**
 * Class for test LoggerInterface
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 * @abstract
 */
abstract class LoggerInterfaceTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Get logger
     * 
     * @return LoggerInterface
     */
    abstract protected function getLogger(): LoggerInterface;

   /**
    * Get logs
    * 
    * @return string[]
    */
    abstract public function getLogs();

    /**
     * @covers \Seeren\Log\Logger::__construct
     */
    public function testImplements()
    {
        $this->assertInstanceOf(LoggerInterface::class, $this->getLogger());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::alert
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testAlert()
    {
        $level = LogLevel::ALERT;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::critical
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testCritical()
    {
        $level = LogLevel::CRITICAL;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::debug
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testDebug()
    {
        $level = LogLevel::DEBUG;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::emergency
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testEmergency()
    {
        $level = LogLevel::EMERGENCY;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
            ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::error
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testError()
    {
        $level = LogLevel::ERROR;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::info
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testInfo()
    {
        $level = LogLevel::INFO;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::notice
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testNotice()
    {
        $level = LogLevel::NOTICE;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::warning
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testWarning()
    {
        $level = LogLevel::WARNING;
        $message = "message of level "
            . $level
            . " with context: {user}";
            $logger = $this->getLogger();
            $logger->{$level}($message, ["user" => "Bob"]);
            $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                ],
                $this->getLogs());
    }

    /**
     * @expectedException \Psr\Log\InvalidArgumentException
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::log
     */
    public function testThrowsOnInvalidLevel()
    {
        $this->getLogger()->log("invalid level", "Foo");
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testContextReplacement()
    {
        $logger = $this->getLogger();
        $logger->log(
            "debug",
            "{Message {nothing} {user} {foo.bar} a}",
            ["user" => "Bob", "foo.bar" => "Bar"]);
        $this->assertEquals(
            ["debug {Message {nothing} Bob Bar a}"],
            $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testContextCanContainAnything()
    {
        $this->getLogger()->log(
            "warning",
            "Crazy context data",
            [
                "bool"     => true,
                "null"     => null,
                "string"   => "Foo",
                "int"      => 0,
                "float"    => 0.5,
                "nested"   => ["with object" => new DummyTest],
                "object"   => new Exception,
                "resource" => fopen("php://memory", "r"),
            ]);
        $this->assertEquals(
            ["warning Crazy context data"],
            $this->getLogs());
    }

    /**
     * @covers \Seeren\Log\Logger::__construct
     * @covers \Seeren\Log\Logger::log
     * @covers \Seeren\Log\Logger::getLogs
     */
    public function testContextExceptionKeyCanBeExceptionOrOtherValues()
    {
        $logger = $this->getLogger();
        $logger->log(
            "warning",
            "Random message",
            ["exception" => "foo"]);
        $logger->log(
            "critical",
            "Uncaught Exception!",
            ["exception" => new Exception]);
        $this->assertEquals(
            ["warning Random message", "critical Uncaught Exception!"],
            $this->getLogs());
    }

}

class DummyTest
{

    public function __toString()
    {
        return "DUMMY";
    }

}

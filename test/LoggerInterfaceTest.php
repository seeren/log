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
 * @version 1.0.1
 */

namespace Seeren\Log\Test;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

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
    abstract public function getLogger(): LoggerInterface;

   /**
    * Get logs
    * 
    * @return string[]
    */
    abstract public function getLogs();

    /**
     * Test instanceof LoggerInterface
     */
    public function testImplements()
    {
        $this->assertInstanceOf(LoggerInterface::class, $this->getLogger());
    }

    /**
     * @dataProvider provideLevelsAndMessages
     * 
     * @param string $level
     * @param string $message
     */
    public function testLogsAtAllLevels($level, $message)
    {
        $logger = $this->getLogger();
        $logger->{$level}($message, ["user" => "Bob"]);
        $logger->log($level, $message, ["user" => "Bob"]);

        $expected = array(
            $level." message of level ".$level." with context: Bob",
            $level." message of level ".$level." with context: Bob",
        );
        $this->assertEquals([
                $level." message of level ".$level." with context: Bob",
                $level." message of level ".$level." with context: Bob",
            ],
            $this->getLogs());
    }

    /**
     * Provide levels and messages
     * 
     * @return array levels and message
     */
    public function provideLevelsAndMessages()
    {
        return [
            LogLevel::EMERGENCY => [
                LogLevel::EMERGENCY,
                "message of level emergency with context: {user}"
            ],
            LogLevel::ALERT => [
                LogLevel::ALERT,
                "message of level alert with context: {user}"
            ],
            LogLevel::CRITICAL => [
                LogLevel::CRITICAL,
                "message of level critical with context: {user}"],
            LogLevel::ERROR => [
                LogLevel::ERROR,
                "message of level error with context: {user}"],
            LogLevel::WARNING => [
                LogLevel::WARNING,
                "message of level warning with context: {user}"],
            LogLevel::NOTICE => [
                LogLevel::NOTICE,
                "message of level notice with context: {user}"],
            LogLevel::INFO => [
                LogLevel::INFO,
                "message of level info with context: {user}"],
            LogLevel::DEBUG => [
                LogLevel::DEBUG,
                "message of level debug with context: {user}"],
        ];
    }

    /**
     * Test invalid argument exception
     * 
     * @expectedException \Psr\Log\InvalidArgumentException
     */
    public function testThrowsOnInvalidLevel()
    {
        $this->getLogger()->log("invalid level", "Foo");
    }

    /**
     * Test context replacement
     */
    public function testContextReplacement()
    {
        $logger = $this->getLogger();
        $logger->info(
            "{Message {nothing} {user} {foo.bar} a}",
            ["user" => "Bob", "foo.bar" => "Bar"]);
        $expected = ["info {Message {nothing} Bob Bar a}"];
        $this->assertEquals($expected, $this->getLogs());
    }

    /**
     * Test context that contain anything
     */
    public function testContextCanContainAnything()
    {
        $this->getLogger()->warning(
            "Crazy context data",
            [
                "bool"     => true,
                "null"     => null,
                "string"   => "Foo",
                "int"      => 0,
                "float"    => 0.5,
                "nested"   => ["with object" => new DummyTest],
                "object"   => new \DateTime,
                "resource" => fopen("php://memory", "r"),
            ]);
        $expected = ["warning Crazy context data"];
        $this->assertEquals($expected, $this->getLogs());
    }

    /**
     * Test context exception key
     */
    public function testContextExceptionKeyCanBeExceptionOrOtherValues()
    {
        $logger = $this->getLogger();
        $logger->warning("Random message", ["exception" => "oops"]);
        $logger->critical(
            "Uncaught Exception!",
            ["exception" => new \LogicException("Fail")]);
        $expected = ["warning Random message", "critical Uncaught Exception!"];
        $this->assertEquals($expected, $this->getLogs());
    }

}

class DummyTest
{

    public function __toString()
    {
        return "DUMMY";
    }

}

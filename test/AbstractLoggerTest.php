<?php

/**
 * This file contain Seeren\Log\Test\AbstractLoggerTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/log
 * @version 2.0.1
 */

namespace Seeren\Log\Test;

use Psr\Log\LoggerInterface;
use Exception;

/**
 * Class for test LoggerInterface
 * 
 * @category Seeren
 * @package Log
 * @subpackage Test
 * @abstract
 */
abstract class AbstractLoggerTest extends \PHPUnit\Framework\TestCase
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
    abstract protected function getLogs();
    
    /**
     * Assert levels
     *
     * @param string $level
     */
    protected function assertLevels(string $level)
    {
        $message = "message of level " . $level . " with context: {user}";
        $logger = $this->getLogger();
        $logger->{$level}($message, ["user" => "Bob"]);
        $this->assertEquals([
            $level." message of level " . $level . " with context: Bob",
        ],
            $this->getLogs());
    }

    /**
     * Test implements
     */
    public function testImplements()
    {
        $this->assertInstanceOf(LoggerInterface::class, $this->getLogger());
    }

    /**
     * Test invalid argument exception
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
        $logger->log(
            "debug",
            "{Message {nothing} {user} {foo.bar} a}",
            ["user" => "Bob", "foo.bar" => "Bar"]);
        $this->assertEquals(
            ["debug {Message {nothing} Bob Bar a}"],
            $this->getLogs());
    }

    /**
     * Test context that contain anything
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
        $this->assertEquals(["warning Crazy context data"],  $this->getLogs());
    }

    /**
     * Test context key
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

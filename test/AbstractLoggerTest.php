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
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
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
     * Assert implements
     */
    protected final function assertImplements()
    {
        $this->assertInstanceOf(LoggerInterface::class, $this->getLogger());
    }

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
     * Assert invalid argument exception
     */
    protected function assertThrowsOnInvalidLevel()
    {
        $this->getLogger()->log("invalid level", "Foo");
    }

    /**
     * Assert context replacement
     */
    protected function assertContextReplacement()
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
     * Assert context that contain anything
     */
    protected function assertContextCanContainAnything()
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
     * Assert context key
     */
    protected function assertContextExceptionKeyCanBeExceptionOrOtherValues()
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
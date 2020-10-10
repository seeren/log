<?php

namespace Seeren\Log\Test;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use Seeren\Log\Level;
use Seeren\Log\LevelInterface;

class LevelTest extends TestCase
{

    /**
     * @return LevelInterface
     */
    private final function getMock(): LevelInterface
    {
        return $this->createMock(Level::class);
    }

    /**
     * @covers \Seeren\Log\Level::level
     * @covers \Seeren\Log\Level::emergency
     * @covers \Seeren\Log\Level::critical
     * @covers \Seeren\Log\Level::error
     * @covers \Seeren\Log\Level::warning
     * @covers \Seeren\Log\Level::notice
     * @covers \Seeren\Log\Level::info
     * @covers \Seeren\Log\Level::debug
     */
    public function testLevel(): void
    {
        $level = $this->getMock();
        $this->assertTrue(
            LogLevel::EMERGENCY === $level->level(42000)
            && LogLevel::ALERT === $level->level(0)
            && LogLevel::ALERT === $level->level(123)
            && LogLevel::CRITICAL === $level->level(E_ERROR)
            && LogLevel::ERROR === $level->level(E_USER_ERROR)
            && LogLevel::WARNING === $level->level(E_WARNING)
            && LogLevel::NOTICE === $level->level(E_NOTICE)
            && LogLevel::INFO === $level->level(E_STRICT)
            && LogLevel::DEBUG === $level->level(E_DEPRECATED)
        );
    }

}

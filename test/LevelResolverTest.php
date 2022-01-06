<?php

namespace Seeren\Log\Test;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use Seeren\Log\LevelResolver;
use Seeren\Log\LevelResolverInterface;

class LevelResolverTest extends TestCase
{

    private function getMock(): LevelResolverInterface
    {
        return $this->createMock(LevelResolver::class);
    }

    /**
     * @covers \Seeren\Log\LevelResolver::getLevel
     */
    public function testLevel(): void
    {
        $level = $this->getMock();
        $this->assertTrue(
            LogLevel::EMERGENCY === $level->getLevel(42000)
            && LogLevel::ALERT === $level->getLevel(0)
            && LogLevel::ALERT === $level->getLevel(123)
            && LogLevel::CRITICAL === $level->getLevel(E_ERROR)
            && LogLevel::ERROR === $level->getLevel(E_USER_ERROR)
            && LogLevel::WARNING === $level->getLevel(E_WARNING)
            && LogLevel::NOTICE === $level->getLevel(E_NOTICE)
            && LogLevel::INFO === $level->getLevel(E_STRICT)
            && LogLevel::DEBUG === $level->getLevel(E_DEPRECATED)
        );
    }

}

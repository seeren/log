<?php

namespace Seeren\Log;

/**
 * Interface LevelInterface for determine error level
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Log
 */
interface LevelInterface
{

    /**
     * @var string
     */
    const EMERGENCY = "emergency";

    /**
     * @var string
     */
    const ALERT = "alert";

    /**
     * @var string
     */
    const CRITICAL = "critical";

    /**
     * @var string
     */
    const ERROR = "error";

    /**
     * @var string
     */
    const WARNING = "warning";

    /**
     * @var string
     */
    const NOTICE = "notice";

    /**
     * @var string
     */
    const INFO = "info";

    /**
     * @var string
     */
    const DEBUG = "debug";

    /**
     * Get level
     *
     * @param int $type
     * @return string
     */
    public function level(int $type): string;

}

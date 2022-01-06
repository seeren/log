<?php

namespace Seeren\Log;

interface LevelResolverInterface
{

    public function getLevel(int $errorType): string;

}

<?php

namespace Seeren\Log\Logger;

class Daily extends AbstractLogger
{

    protected function getFileName(): string
    {
        return date('Y-m-d');
    }

    protected function getLogName(): string
    {
        return date('H:i:s');
    }

}

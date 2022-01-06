<?php

namespace Seeren\Log\Logger;

class Monthly extends AbstractLogger
{

    protected function getFileName(): string
    {
        return date('Y-m');
    }

    protected function getLogName(): string
    {
        return date('d.H:i:s');
    }

}

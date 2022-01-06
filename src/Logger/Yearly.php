<?php

namespace Seeren\Log\Logger;

class Yearly extends AbstractLogger
{

    protected function getFileName(): string
    {
        return date('Y');
    }

    protected function getLogName(): string
    {
        return date('m-d.H:i:s');
    }

}

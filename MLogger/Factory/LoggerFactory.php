<?php

namespace MLogger\Factory;

use \MLogger\Factory\Abstracts\LoggerFactoryInterface;
use MLogger\Logger\Abstracts\LoggerInterface;

class LoggerFactory implements LoggerFactoryInterface
{
    public function setLogger(LoggerInterface $logger): LoggerInterface
    {
        return new $logger();
    }
}

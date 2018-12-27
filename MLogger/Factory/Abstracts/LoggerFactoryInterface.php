<?php

namespace MLogger\Factory\Abstracts;

use MLogger\Logger\Abstracts\LoggerInterface;

interface LoggerFactoryInterface
{
    //logger interface'i implement eden herhangi bir logger sınıfı
    public function setLogger(LoggerInterface $logger) : LoggerInterface;
}

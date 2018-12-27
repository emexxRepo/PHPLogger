<?php

namespace MLogger\Logger;

use MLogger\Logger\Abstracts\AbstractLogger;
use MLogger\Level\LogLevel;

final class FileLogger extends AbstractLogger
{
    private $path = '';

    public function setPath(string $path)
    {
        // dosya varmı yokmu kontrol ediyoruz
        if (!file_exists($path)) {
            throw new \Exception('File Not Found !');
        }

        $this->path = $path;
    }

    public function emergency(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::EMERGENCY);
    }

    public function alert(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::EMERGENCY);
    }

    public function critical(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::EMERGENCY);
    }

    public function error(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::EMERGENCY);
    }

    public function warning(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::WARNING);
    }

    public function notice(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::NOTICE);
    }

    public function info(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::INFO);
    }

    public function debug(string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save(LogLevel::DEBUG);
    }

    public function log(string $level, string $message, array $context = []) : void
    {
        // aldığımız mesajı set ediyoruz
        $this->message = $this->interpolate($message, $context);
        // ve kayıt ediyoruz
        $this->save($level);
    }

    protected function save(string $level) : void
    {
        file_put_contents($this->path, $this->getDate() . ' ' . $this->message . ' ' . $level . PHP_EOL, FILE_APPEND);
    }
}

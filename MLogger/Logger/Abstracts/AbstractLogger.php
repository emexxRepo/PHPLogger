<?php

namespace MLogger\Logger\Abstracts;

abstract class AbstractLogger implements LoggerInterface
{
    protected $message = '';

    // context parametresinde verilen süslü parantezlerin içerisindeki keyi vale set ediyoruz
    protected function interpolate(string $message, array $context = []):string
    {
        $replace = [];
        if (empty($context)) {
            return $message;
        } else {
            foreach ($context as $key => $val) {
                if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                    $replace['{' . $key . '}'] = $val;
                }
            }

            return strtr($message, $replace);
        }
    }

    // TARİH DÖNDÜRÜYORUZ
    protected function getDate() : string
    {
        return (new \DateTime('now'))->format('Y-m-d H:i:s');
    }

    // SAVE METHODUNU TÜM LOGGER SINIFLARINA ZORAKİ KILIYORUZ
    abstract protected function save(string $level) : void;
}

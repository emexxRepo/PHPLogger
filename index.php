<?php
require 'vendor/autoload.php';
use MLogger\Logger\FileLogger;
use MLogger\Factory\LoggerFactory;

$logpath = __DIR__ . '/public/logs.log'; // Loglarımızın kaydedileceği dosya
$logger = (new LoggerFactory())->setLogger(new FileLogger); // LoggerFactory Aracılığı ile File Logger Sınıfımızı oluşturuyoruz
$logger->setPath($logpath); // pathimizi setliyoruz
$logger->emergency('User {username} created', ['username' => 'test']); // logumuzu oluşturuyoruz context parametresi boş geçilebilir

// result = User test created

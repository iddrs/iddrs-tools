<?php

namespace support\log;

use Monolog\Level;
use Stringable;

function log(Level $level, string|Stringable $message, array $context = []): void {
    static $instance = null;
    if(is_null($instance)) {
        $logger = new \Monolog\Logger($_ENV['ENVIRONMENT']);
        $handler = new \Monolog\Handler\StreamHandler('php://stdout', get_level());
        $formatter = new \Bramus\Monolog\Formatter\ColoredLineFormatter(new \Bramus\Monolog\Formatter\ColorSchemes\TrafficLight(), "[%datetime%] %channel%.%level_name%: %message% %context%\n", 'Y-m-d H:i:s');
        $handler->setFormatter($formatter);
        $logger->pushHandler($handler);
        $instance = $logger;
    }
    $instance->log($level, $message, $context);
}

function get_level(): \Monolog\Level {
    switch (strtolower($_ENV['LOG_LEVEL'])){
        case 'alert':
            return \Monolog\Level::Alert;
        case 'critical':
            return \Monolog\Level::Critical;
        case 'debug':
            return \Monolog\Level::Debug;
        case 'emergency':
            return \Monolog\Level::Emergency;
        case 'error':
            return \Monolog\Level::Error;
        case 'info':
            return \Monolog\Level::Info;
        case 'warning':
            return \Monolog\Level::Warning;
        case 'notice':
            return \Monolog\Level::Notice;
        default :
            throw new \Exception('LOG_LEVEL não foi definido ou tem valor inválido. Verifique o arquivo .env', E_USER_ERROR);
    }
}

function emergency(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Emergency, $message, $context);
}

function alert(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Alert, $message, $context);
}

function critical(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Critical, $message, $context);
}

function error(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Error, $message, $context);
}

function warning(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Warning, $message, $context);
}

function notice(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Notice, $message, $context);
}

function info(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Info, $message, $context);
}

function debug(string|\Stringable $message, array $context = []): void {
    log(\Monolog\Level::Debug, $message, $context);
}
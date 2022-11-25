<?php

namespace App\Service;

use App\Service\Log\Log4php;
use App\Service\Log\ThinkLog;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        // 简单工厂模式
        switch ($type) {
            case self::TYPE_LOG4PHP:
                $this->logger = new Log4php;
                break;
            case self::TYPE_THINKLOG:
                $this->logger = new ThinkLog;
                break;
        }
    }
    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}

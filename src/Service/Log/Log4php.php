<?php

namespace App\Service\Log;

class Log4php
{
    private $handle;
    public function __construct()
    {
        $this->handle = \Logger::getLogger("Log");
        \Logger::configure(array(
            'rootLogger' => array(
                'appenders' => array('default'),
            ),
            'appenders' => array(
                'default' => array(
                    'class' => 'LoggerAppenderFile',
                    'layout' => array(
                        'class' => 'LoggerLayoutSimple'
                    ),
                    'params' => array(
                        'file' => 'I:/lmcar-php-test/logs/log4php/' . date('Ym') . '/' . date('d') . '.log',
                        'append' => true
                    )
                )
            )
        ));
    }
    public function info($message = '')
    {
        $this->handle->info($message);
    }

    public function debug($message = '')
    {
        $this->handle->debug($message);
    }

    public function error($message = '')
    {
        $this->handle->error($message);
    }
}

<?php

namespace App\Service\Log;

use think\facade\Log;

class ThinkLog
{
    public function __construct()
    {
        Log::init([
            'default'    =>    'file',
            'channels'    =>    [
                'file'    =>    [
                    'type'    =>    'file',
                    'path'    =>    'I:/lmcar-php-test/logs/think_log/',
                ],
            ],
        ]);
    }
    public function info($message = '')
    {
        Log::info(strtoupper($message));
        Log::save();
    }

    public function debug($message = '')
    {
        Log::debug(strtoupper($message));
        Log::save();
    }

    public function error($message = '')
    {
        Log::error(strtoupper($message));
        Log::save();
    }
}

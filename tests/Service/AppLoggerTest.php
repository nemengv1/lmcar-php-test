<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testLog4phpInfoLog()
    {
        $msg = 'This is info log message ' . time() . rand(1, 999);
        $path = 'I:/lmcar-php-test/logs/log4php/' . date('Ym') . '/' . date('d') . '.log';
        $logger = new AppLogger('log4php');
        $logger->info($msg);
        $this->assertFileExists($path);
        $this->assertEquals($msg, mb_substr(str_replace(PHP_EOL, '', $this->readLastLine($path)), 7));
    }
    public function testThinklogInfoLog()
    {
        $msg = 'This is info log message ' . time() . rand(1, 999);
        $path = 'I:/lmcar-php-test/logs/think_log/' . date('Ym') . '/' . date('d') . '_cli.log';
        $logger = new AppLogger('think-log');
        $logger->info($msg);
        $this->assertFileExists($path);
        $this->assertEquals(strtoupper($msg), mb_substr(str_replace(PHP_EOL, '', $this->readLastLine($path)), 34));
    }
    private function readLastLine($file)
    {
        $res = $file;
        $fp = fopen($res, 'r');
        if (false == $fp) {
            return 'error';
        }
        fseek($fp, -1, SEEK_END);
        $s = '';
        while (($c = fgetc($fp)) !== false) {
            if ($c == "\n" && $s) break;
            $s = $c . $s;
            fseek($fp, -2, SEEK_CUR);
        }
        fclose($fp);
        return $s;
    }
}

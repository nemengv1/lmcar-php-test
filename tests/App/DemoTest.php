<?php

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{

    public function test_foo()
    {
        $this->assertEquals('bar', (new Demo(new Applogger(), new HttpRequest()))->foo());
    }

    public function test_get_user_info()
    {
        $res = (new Demo(new Applogger(), new HttpRequest()))->get_user_info();
        $this->assertNotEmpty($res);
        $this->assertArrayHasKey('id', $res);
        $this->assertIsInt($res['id']);
        $this->assertArrayHasKey('username', $res);
        $this->assertIsString($res['username']);
    }
}

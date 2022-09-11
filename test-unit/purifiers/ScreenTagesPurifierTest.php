<?php

namespace Mnemesong\MicrowidgetTestUnit\purifiers;

use Mnemesong\Microwidget\purifiers\ScreenTagsPurifier;
use PHPUnit\Framework\TestCase;

class ScreenTagesPurifierTest extends TestCase
{
    public function testScreen1(): void
    {
        $str = 'Hello!!';
        $result = (new ScreenTagsPurifier())->process($str);
        $this->assertEquals('Hello!!', $result);
    }

    public function testScreen2(): void
    {
        $str = '<h1>Hello!!</h1>';
        $result = (new ScreenTagsPurifier())->process($str);
        $this->assertEquals('&lt;h1&gt;Hello!!&lt;/h1&gt;', $result);
    }

    public function testScreen3(): void
    {
        $str = '&lt;h1&gt;Hello!!&lt;/h1&gt;';
        $result = (new ScreenTagsPurifier())->process($str);
        $this->assertEquals('&amp;lt;h1&amp;gt;Hello!!&amp;lt;/h1&amp;gt;', $result);
    }

    public function testScreen4(): void
    {
        $str = '<h1 name="<?= $hello ?>">Hello!!</h1>';
        $result = (new ScreenTagsPurifier())->process($str);
        $this->assertEquals('&lt;h1 name=&quot;&lt;?= $hello ?&gt;&quot;&gt;Hello!!&lt;/h1&gt;', $result);
    }
}
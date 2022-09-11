<?php

namespace Mnemesong\MicrowidgetTestUnit\purifiers;

use Mnemesong\Microwidget\purifiers\RemoveTagsPurifier;
use PHPUnit\Framework\TestCase;

class RemoveTagsPurifierTest extends TestCase
{
    public function testPurification1(): void
    {
        $str = 'Hello!!';
        $result = (new RemoveTagsPurifier())->process($str);
        $this->assertEquals('Hello!!', $result);
    }

    public function testPurification2(): void
    {
        $str = '<h1>Hello!!</h1>';
        $result = (new RemoveTagsPurifier())->process($str);
        $this->assertEquals('Hello!!', $result);
    }

    public function testPurification3(): void
    {
        $str = '&lt;h1&gt;Hello!!&lt;/h1&gt;';
        $result = (new RemoveTagsPurifier())->process($str);
        $this->assertEquals('&lt;h1&gt;Hello!!&lt;/h1&gt;', $result);
    }

    public function testPurification4(): void
    {
        $str = '<?= $hello ?>!!';
        $result = (new RemoveTagsPurifier())->process($str);
        $this->assertEquals('!!', $result);
    }

}
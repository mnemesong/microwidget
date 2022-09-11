<?php

namespace Mnemesong\MicrowidgetTestUnit;

use Mnemesong\MicrowidgetStubs\MicrowidgetStub;
use PHPUnit\Framework\TestCase;

class MicrowidgetTest extends TestCase
{
    public function testPrint(): void
    {
        $result = (new MicrowidgetStub('aboba'))->run();
        $this->assertEquals("<h1>aboba</h1>", $result);
    }
}
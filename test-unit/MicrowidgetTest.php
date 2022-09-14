<?php

namespace Mnemesong\MicrowidgetTestUnit;

use Mnemesong\MicrowidgetStubs\MicrowidgetStub;
use Mnemesong\MicrowidgetStubs\MicrowidgetStub2;
use PHPUnit\Framework\TestCase;

class MicrowidgetTest extends TestCase
{
    public function testPrint(): void
    {
        $result = MicrowidgetStub::create()
            ->withRawContent('<span id="raw">aboba</span>')
            ->withScreenContent('<span id="screened">kakobar</span>')
            ->withTaglessContent('<span id="tagless">bobaka</span>')
            ->print();
        $expected = <<<HEREDOC
<h1><span id="raw">aboba</span></h1>
<p>bobaka</p>
<div>
    &lt;span id=&quot;screened&quot;&gt;kakobar&lt;/span&gt;</div>
HEREDOC;

        $this->assertEquals($expected, $result);
    }

    public function testEmptyWidget(): void
    {
        $result = MicrowidgetStub2::create()
            ->print();
        $this->assertEquals('', $result);
    }

}
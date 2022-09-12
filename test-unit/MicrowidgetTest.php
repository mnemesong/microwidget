<?php

namespace Mnemesong\MicrowidgetTestUnit;

use Mnemesong\MicrowidgetStubs\MicrowidgetStub;
use PHPUnit\Framework\TestCase;

class MicrowidgetTest extends TestCase
{
    public function testPrint(): void
    {
        $result = (new MicrowidgetStub(
            '<span id="raw">aboba</span>',
            '<span id="tagless">bobaka</span>',
            '<span id="screened">kakobar</span>'
        ))->run();
        $expected = <<<HEREDOC
<h1><span id="raw">aboba</span></h1>
<p>bobaka</p>
<div>
    &lt;span id=&quot;screened&quot;&gt;kakobar&lt;/span&gt;</div>
HEREDOC;

        $this->assertEquals($expected, $result);
    }

}
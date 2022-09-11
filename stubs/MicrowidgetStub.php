<?php
namespace Mnemesong\MicrowidgetStubs;

use Mnemesong\Microwidget\Microwidget;

class MicrowidgetStub extends Microwidget
{
    protected string $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    protected function print(): void
    {
        ?>
        <h1><?= $this->content ?></h1>
        <?php
    }

}
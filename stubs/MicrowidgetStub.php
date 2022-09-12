<?php
namespace Mnemesong\MicrowidgetStubs;

use Mnemesong\Microwidget\Microwidget;

class MicrowidgetStub extends Microwidget
{
    protected string $rawContent;
    protected string $taglessContent;
    protected string $screenContent;

    /**
     * @param string $rawContent
     * @param string $taglessContent
     * @param string $screenContent
     */
    public function __construct(string $rawContent, string $taglessContent, string $screenContent)
    {
        $this->rawContent = $rawContent;
        $this->taglessContent = $taglessContent;
        $this->screenContent = $screenContent;
    }


    protected function template(): void
    {
        ?>
        <h1><?= $this->rawContent ?></h1>
        <p><?= $this->clearTags($this->taglessContent) ?></p>
        <div>
            <?= $this->screenTags($this->screenContent) ?></div>
        <?php
    }

    protected function script(): void
    {
    }
}
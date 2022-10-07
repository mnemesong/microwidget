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
     * @return MicrowidgetStub
     */
    public function withRawContent(string $rawContent): self
    {
        $clone = clone $this;
        $clone->rawContent = $rawContent;
        return $clone;
    }

    /**
     * @param string $taglessContent
     * @return MicrowidgetStub
     */
    public function withTaglessContent(string $taglessContent): self
    {
        $clone = clone $this;
        $clone->taglessContent = $taglessContent;
        return $clone;
    }

    /**
     * @param string $screenContent
     * @return MicrowidgetStub
     */
    public function withScreenContent(string $screenContent): self
    {
        $clone = clone $this;
        $clone->screenContent = $screenContent;
        return $clone;
    }

    /**
     * @return string
     */
    public function print(): string
    {
        return $this->r(function () {
            ?>
                <h1><?= $this->rawContent ?></h1>
                <p><?= $this->clearTags($this->taglessContent) ?></p>
                <div>
                    <?= $this->screenTags($this->screenContent) ?></div>
            <?php
        });
    }
}
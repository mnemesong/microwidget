<?php

namespace Mnemesong\Microwidget;

use Mnemesong\Microwidget\helpers\PrevTabsClearHelpers;

abstract class Microwidget
{
    /**
     * @return void
     */
    abstract protected function template(): void;

    /**
     * @return void
     */
    abstract protected function script(): void;

    /**
     * @return string
     */
    public function run(): string
    {
        return $this->printScript();
    }

    protected function printScript(): string
    {
        ob_start();
        $this->template();
        $content = ob_get_clean();
        return PrevTabsClearHelpers::clear($content);
    }

    protected function printTemplate(): string
    {
        ob_start();
        $this->template();
        $content = ob_get_clean();
        return PrevTabsClearHelpers::clear($content);
    }

    /**
     * @param string $text
     * @return string
     */
    protected function clearTags(string $text): string
    {
        return strip_tags($text);
    }

    /**
     * @param string $text
     * @return string
     */
    protected function screenTags(string $text): string
    {
        return htmlspecialchars($text);
    }

}
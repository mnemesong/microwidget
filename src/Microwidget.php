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
        $s = $this->printScript();
        return $this->printTemplate() . (!empty($s) ? ("\r\n" . $s) : '');
    }

    /**
     * @return string
     */
    public function printScript(): string
    {
        ob_start();
        $this->script();
        $content = ob_get_clean();
        return PrevTabsClearHelpers::clear($content);
    }

    /**
     * @return string
     */
    public function printTemplate(): string
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
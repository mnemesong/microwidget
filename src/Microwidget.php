<?php

namespace Mnemesong\Microwidget;

use Mnemesong\Microwidget\helpers\PrevTabsClearHelpers;

abstract class Microwidget
{
    final public function __construct() {}

    /**
     * @return void
     */
    abstract protected function template(): void;

    /**
     * @return string
     */
    public function print(): string
    {
        ob_start();
        $this->template();
        $content = ob_get_clean();
        $content = ($content === false) ? "" : $content;
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

    /**
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

}
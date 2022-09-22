<?php

namespace Mnemesong\Microwidget;

use Mnemesong\Microwidget\helpers\PrevTabsClearHelpers;

abstract class Microwidget
{
    final protected function __construct() {}

    /**
     * @return string
     */
    abstract public function print(): string;

    /**
     * @param callable $callback
     * @return string
     */
    protected function render(callable $callback): string
    {
        ob_start();
        $callback();
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
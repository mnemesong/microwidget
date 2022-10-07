<?php

namespace Mnemesong\Microwidget;

use Mnemesong\Microwidget\traits\MicrowidgetTrait;

abstract class Microwidget
{
    use MicrowidgetTrait;

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
        return $this->r($callback);
    }


    /**
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

}
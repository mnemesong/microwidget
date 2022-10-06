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
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

}
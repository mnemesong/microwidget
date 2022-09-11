<?php

namespace Mnemesong\Microwidget;

abstract class Microwidget
{
    protected ?PurifierInterface $purifier = null;

    abstract protected function print(): void;

    public function run(): string
    {
        ob_start();
        $this->print();
        $content = ob_get_clean();
        $content = trim($content);
        return isset($this->purifier) ? $this->purifier->process($content) : $content;
    }
}
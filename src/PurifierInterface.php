<?php

namespace Mnemesong\Microwidget;

interface PurifierInterface
{
    public function process(string $text): string;
}
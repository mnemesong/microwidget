<?php

namespace Mnemesong\Microwidget\purifiers;

use Mnemesong\Microwidget\PurifierInterface;

class RemoveTagsPurifier implements PurifierInterface
{

    public function process(string $text): string
    {
        return strip_tags($text);
    }
}
<?php

namespace Mnemesong\Microwidget\purifiers;

use Mnemesong\Microwidget\PurifierInterface;

class ScreenTagsPurifier implements PurifierInterface
{

    public function process(string $text): string
    {
        return htmlspecialchars($text);
    }
}
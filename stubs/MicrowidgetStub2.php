<?php

namespace Mnemesong\MicrowidgetStubs;

use Mnemesong\Microwidget\Microwidget;

class MicrowidgetStub2 extends Microwidget
{
    public function print(): string
    {
        return $this->render(function () {
            ?>

            <?php
        });
    }
}
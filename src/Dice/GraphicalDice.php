<?php

declare(strict_types=1);

namespace Rahn20\Dice;

/**
 * Class Dice.
 */
class GraphicalDice extends Dice
{
    public function graphic(int $rollDice): string
    {
        return "dice-" . $rollDice;
    }
}

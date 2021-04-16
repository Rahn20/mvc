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
        //parent::roll();
        if ($rollDice == 1) {
            return "dice-1";
        } elseif ($rollDice == 2) {
            return "dice-2";
        } elseif ($rollDice == 3) {
            return "dice-3";
        } elseif ($rollDice == 4) {
            return "dice-4";
        } elseif ($rollDice == 5) {
            return "dice-5";
        } elseif ($rollDice == 6) {
            return "dice-6";
        }    
    }
}

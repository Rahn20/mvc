<?php

declare(strict_types=1);

namespace Rahn20\Dice;

/**
 * Class Dice.
 */
class Dice
{
    //const FACES = 6;
    private ?int $roll = null;

    public function roll(): int
    {
        $this->roll = rand(1, 6);
        //$this->roll = rand(1, self::FACES);
        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll;
    }
}

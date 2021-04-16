<?php

declare(strict_types=1);

namespace Rahn20\Dice;

/**
 * Class DiceHand.
 */
class DiceHand
{
    private array $dices;
    private int $sum;
    private int $size;

    public function __construct(int $number)
    {
        for ($i = 1; $i <= $number; $i++) {
            $this->dices[$i] = new Dice();
            $this->size = $i;
        }
    }

    public function rollDices(): void
    {
        $this->sum = 0;

        for ($i = 1; $i <= $this->size; $i++) {
            $this->sum += $this->dices[$i]->roll();
        }
        
    }

    public function getLastRoll(): string
    {
        $this->rollDices();
        $result = "";

        for ($i = 1; $i <= $this->size; $i++) {
            $result .= $this->dices[$i]->getLastRoll() . ", ";
        }
        return (rtrim($result, ',\ ') . "<br></br>" . "The sum is: " . $this->sum);
    }

    public function theSum(): int
    {
        return $this->sum;
    }     
}

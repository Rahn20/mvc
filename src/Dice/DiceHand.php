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
    private $values = [];
    private $yatzyValues = [];

    public function __construct(int $number)
    {
        for ($i = 0; $i <= ($number -1); $i++) {
            $this->dices[$i] = new Dice();
            $this->values[] = null;
            //$this->yatzyValues[] = 0;
            $this->size = $i;
        }
    }

    /**
     * roll the dices, save them in the values object
     * sum the values 
     * @return void with the sum of the values
    */
    public function rollDices(): void
    {
        $this->sum = 0;
        for ($i = 0; $i <= $this->size; $i++) {
            $roll = $this->dices[$i]->roll();
            $this->sum += $roll;
            $this->values[$i] += $roll;
        } 
    }

    /**
     * roll the dices, Get last roll
     * @return string with result + the sum of the values
    */
    public function getLastRoll(): string
    {
        $this->rollDices();
        $result = "";

        for ($i = 0; $i <= $this->size; $i++) {
            $result .= $this->dices[$i]->getLastRoll() . ", ";
        }
        return (rtrim($result, ',\ ') . "<br></br>" . "The sum is: " . $this->sum);
    }

    /**
     * @return int the sum
    */
    public function theSum(): int
    {
        return $this->sum;
    }

    /**
     * @return array
    */
    public function values(): array
    {
        return $this->values;
    }

    /**
     *
    */
    public function getAllValues(): void
    {
        $i = 0;
        $this->yatzyValues[0] = 0;
        $this->yatzyValues[1] = 0;
        $this->yatzyValues[2] = 0;
        $this->yatzyValues[3] = 0;
        $this->yatzyValues[4] = 0;
        $this->yatzyValues[5] = 0;

        for ($i = 0; $i <= (count($this->values)-1); $i++) {
            if ($this->values[$i] == 1) {
                $this->yatzyValues[0] += 1;
            } elseif ($this->values[$i] == 2) {
                $this->yatzyValues[1] += 2;
            } elseif ($this->values[$i] == 3) {
                $this->yatzyValues[2] += 3;
            } elseif ($this->values[$i] == 4) {
                $this->yatzyValues[3] += 4;
            } elseif ($this->values[$i] == 5) {
                $this->yatzyValues[4] += 5;
            } elseif ($this->values[$i] == 6) {
                $this->yatzyValues[5] += 6;
            }
        }
    }

    /**
     * @return array
    */
    public function result(array $option): array
    {
        $i = 0;
        while ($i <= count($option)-1) {
            if ($option[$i] == 1) {
                $this->yatzyValues[0] += 1;
            } elseif ($option[$i] == 2){
                $this->yatzyValues[1] += 2;
            } elseif ($option[$i] == 3) {
                $this->yatzyValues[2] += 3;
            } elseif ($option[$i] == 4) {
                $this->yatzyValues[3] += 4;
            } elseif ($option[$i] == 5) {
                $this->yatzyValues[4] += 5;
            } elseif ($option[$i] == 6) {
                $this->yatzyValues[5] += 6;
            }
            $i++;
        }
        return $this->yatzyValues;
    }
}

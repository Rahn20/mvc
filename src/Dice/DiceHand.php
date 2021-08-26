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
<<<<<<< HEAD
=======
    private int $size;
>>>>>>> refs/remotes/origin/main
    private $values = [];
    private $yatzyValues = [];

    public function __construct(int $number)
    {
<<<<<<< HEAD
        for ($i = 0; $i <= ($number - 1); $i++) {
            $this->dices[$i] = new Dice();
            $this->values[] = null;
=======
        for ($i = 0; $i <= ($number -1); $i++) {
            $this->dices[$i] = new Dice();
            $this->values[] = null;
            //$this->yatzyValues[] = 0;
            $this->size = $i;
>>>>>>> refs/remotes/origin/main
        }
    }

    /**
<<<<<<< HEAD
     * roll the dices, save them in the values object + sum the values
=======
     * roll the dices, save them in the values object
     * sum the values 
>>>>>>> refs/remotes/origin/main
     * @return void with the sum of the values
    */
    public function rollDices(): void
    {
        $this->sum = 0;
<<<<<<< HEAD
        $count = count($this->dices) - 1;
        //for ($i = 0; $i <= $this->size; $i++) {
        for ($i = 0; $i <= $count; $i++) {
            $roll = $this->dices[$i]->roll();
            $this->sum += $roll;
            $this->values[$i] += $roll;
        }
=======
        for ($i = 0; $i <= $this->size; $i++) {
            $roll = $this->dices[$i]->roll();
            $this->sum += $roll;
            $this->values[$i] += $roll;
        } 
>>>>>>> refs/remotes/origin/main
    }

    /**
     * roll the dices, Get last roll
<<<<<<< HEAD
     * @return string with values
=======
     * @return string with result + the sum of the values
>>>>>>> refs/remotes/origin/main
    */
    public function getLastRoll(): string
    {
        $this->rollDices();
<<<<<<< HEAD
        return implode(", ", $this->values);
=======
        $result = "";

        for ($i = 0; $i <= $this->size; $i++) {
            $result .= $this->dices[$i]->getLastRoll() . ", ";
        }
        return (rtrim($result, ',\ ') . "<br></br>" . "The sum is: " . $this->sum);
>>>>>>> refs/remotes/origin/main
    }

    /**
     * @return int the sum
    */
    public function theSum(): int
    {
        return $this->sum;
    }

    /**
<<<<<<< HEAD
     * Get the values
=======
>>>>>>> refs/remotes/origin/main
     * @return array
    */
    public function values(): array
    {
        return $this->values;
    }

    /**
<<<<<<< HEAD
     * Put the values in a new array 'yatzyValues'
    */
    public function getAllValues(): void
    {
        //$i = 0;
        $count = count($this->values) - 1;
=======
     *
    */
    public function getAllValues(): void
    {
        $i = 0;
>>>>>>> refs/remotes/origin/main
        $this->yatzyValues[0] = 0;
        $this->yatzyValues[1] = 0;
        $this->yatzyValues[2] = 0;
        $this->yatzyValues[3] = 0;
        $this->yatzyValues[4] = 0;
        $this->yatzyValues[5] = 0;

<<<<<<< HEAD
        for ($i = 0; $i <= $count; $i++) {
=======
        for ($i = 0; $i <= (count($this->values)-1); $i++) {
>>>>>>> refs/remotes/origin/main
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
<<<<<<< HEAD
     * get all the yatzy values
     * @return array
    */
    public function yatzyvalues(): array
    {
        return $this->yatzyValues;
    }


    /**
     * increase the value that has the same number and update
     * the yatzyValues array with the new value
=======
>>>>>>> refs/remotes/origin/main
     * @return array
    */
    public function result(array $option): array
    {
<<<<<<< HEAD
        $opt = count($option) - 1;
        $count = 0;

        while ($count <= $opt) {
            if ($option[$count] == 1) {
                $this->yatzyValues[0] += 1;
            } elseif ($option[$count] == 2) {
                $this->yatzyValues[1] += 2;
            } elseif ($option[$count] == 3) {
                $this->yatzyValues[2] += 3;
            } elseif ($option[$count] == 4) {
                $this->yatzyValues[3] += 4;
            } elseif ($option[$count] == 5) {
                $this->yatzyValues[4] += 5;
            } elseif ($option[$count] == 6) {
                $this->yatzyValues[5] += 6;
            }
            $count++;
=======
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
>>>>>>> refs/remotes/origin/main
        }
        return $this->yatzyValues;
    }
}

<?php

namespace Rahn20\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceHandTest extends TestCase
{
    /**
     * test roll dices and count how many dices are in the Dicehand
     * properties, use one argument.
     */
    public function testCountDiceHand(): void
    {
        $diceHand = new DiceHand(3);
        $this->assertInstanceOf("\Rahn20\Dice\DiceHand", $diceHand);

        $diceHand->rollDices();
        $res = $diceHand->values();
        $this->assertEquals(3, count($res));
    }

    /**
     * test the sum of the values
     * properties, use one argument.
     */
    public function testSumTheValues(): void
    {
        $diceHand = new DiceHand(3);
        $this->assertInstanceOf("\Rahn20\Dice\DiceHand", $diceHand);

        $diceHand->rollDices();
        $res = $diceHand->theSum();
        $exp = array_sum($diceHand->values());
        $this->assertEquals($exp, $res);
    }

    /**
     * test get the values of the last roll
     * properties, use one argument.
     */
    public function testGetLastRoll(): void
    {
        $diceHand = new DiceHand(4);
        $this->assertInstanceOf("\Rahn20\Dice\DiceHand", $diceHand);

        $res = $diceHand->getLastRoll();
        $exp = implode(", ", $diceHand->values());
        $this->assertEquals($exp, $res);
    }

    /**
     * test yatzyvalues, doing 3 tests
     * properties, use one argument.
     */
    public function testGetAllYatzyValues(): void
    {
        $diceHandTest1 = new DiceHand(8);
        $diceHandTest2 = new DiceHand(7);
        $diceHandTest3 = new DiceHand(6);

        $diceHandTest1->rollDices();
        $diceHandTest2->rollDices();
        $diceHandTest3->rollDices();

        $diceHandTest1->getAllValues();
        $res1 = $diceHandTest1->result($diceHandTest1->values());
        $exp1 = $diceHandTest1->yatzyvalues();
        $this->assertEquals($exp1, $res1);

        $diceHandTest2->getAllValues();
        $res2 = $diceHandTest2->result($res1);
        $exp2 = $diceHandTest2->yatzyvalues();
        $this->assertEquals($exp2, $res2);

        $diceHandTest3->getAllValues();
        $res3 = $diceHandTest3->result([1, 2, 3, 4, 5, 6]);
        $exp3 = $diceHandTest3->yatzyvalues();
        $this->assertEquals($exp3, $res3);
    }
}

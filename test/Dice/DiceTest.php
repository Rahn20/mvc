<?php

namespace Rahn20\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceTest extends TestCase
{
    /**
     * Test roll the dice and get the value
     * properties, use no arguments.
     */
    public function testRoll(): void
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Rahn20\Dice\Dice", $dice);

        $res = $dice->roll();
        $exp = $dice->getLastRoll();
        $this->assertEquals($exp, $res);
    }
}

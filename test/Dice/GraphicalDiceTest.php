<?php

namespace Rahn20\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class GraphicalDiceTest extends TestCase
{
    /**
     * Test graphical funtion
     * properties, use one arguments.
     */
    public function testGraphic(): void
    {
        $graphic = new GraphicalDice();
        $this->assertInstanceOf("\Rahn20\Dice\GraphicalDice", $graphic);

        $res = $graphic->graphic(5);
        $exp = "dice-5";
        $this->assertEquals($exp, $res);
    }
}

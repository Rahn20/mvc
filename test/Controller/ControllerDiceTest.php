<?php

declare(strict_types=1);

namespace Rahn20\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Session.
 */
class ControllerDiceTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new Dice();
        $this->assertInstanceOf("\Rahn20\Controller\Dice", $controller);
    }

    /**
     * Check that the controller returns a response.
     * @runInSeparateProcess
     */
    public function testControllerReturnsResponse()
    {
        $controller = new Dice();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->index();
        $this->assertInstanceOf($exp, $res);
    }


    /**
     * Destroy the dice session.
     * @runInSeparateProcess
     */
    public function testDestroyDiceSession()
    {
        session_start();
        $controller = new Dice();

        $_SESSION = [
            "key" => "value"
        ];

        $this->assertEquals($_SESSION, ["key" => "value"]);
        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->destroyDice();
        $this->assertInstanceOf($exp, $res);
        $this->assertEmpty($_SESSION);
    }

    /**
     * Check that the controller returns a response.
     * @runInSeparateProcess
     */
    public function testControllerPlayReturnsResponse()
    {
        $controller = new Dice();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->play();
        $this->assertInstanceOf($exp, $res);
    }
}

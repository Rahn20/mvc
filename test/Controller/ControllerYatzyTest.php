<?php

declare(strict_types=1);

namespace Rahn20\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Session.
 */
class ControllerYatzyTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new Yatzy();
        $this->assertInstanceOf("\Rahn20\Controller\Yatzy", $controller);
    }

    /**
     * Check that the controller returns a response.
     * @runInSeparateProcess
     */
    public function testControllerReturnsResponse()
    {
        $controller = new Yatzy();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->index();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Destroy the yatzy session.
     * @runInSeparateProcess
     */
    public function testDestroyYatzySession()
    {
        session_start();
        $controller = new Yatzy();

        $_SESSION = [
            "key" => "value"
        ];

        $this->assertEquals($_SESSION, ["key" => "value"]);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->destroyYatzy();
        $this->assertInstanceOf($exp, $res);
        $this->assertEmpty($_SESSION);
    }

    /**
     * Check that the controller returns a response.
     * @runInSeparateProcess
     */
    public function testControllerPlayReturnsResponse()
    {
        $controller = new Yatzy();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->play();
        $this->assertInstanceOf($exp, $res);
    }
}

<?php

declare(strict_types=1);

namespace Rahn20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
//use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

use function Rahn20\Functions\{
    destroySession,
    renderView,
    url
};

/**
 * Controller for the session routes.
 */
class Yatzy
{
    public function index(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/yatzy.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }


    public function destroyYatzy(): ResponseInterface
    {
        destroySession();

        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(301)
            ->withHeader("Location", url("/yatzy"));
    }


    public function play(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("yatzy_play.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}

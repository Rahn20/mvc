<?php

declare(strict_types=1);

namespace Rahn20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
<<<<<<< HEAD
//use Nyholm\Psr7\Response;
=======
use Nyholm\Psr7\Response;
>>>>>>> refs/remotes/origin/main
use Psr\Http\Message\ResponseInterface;

use function Rahn20\Functions\{
    destroySession,
    renderView,
    url
};

/**
 * Controller for the session routes.
 */
class Dice
{
    public function index(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/dice.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }


    public function destroyDice(): ResponseInterface
    {
        destroySession();

<<<<<<< HEAD
        //return (new Response())
        //    ->withStatus(301)
        //    ->withHeader("Location", url("/dice"));

        // Create and return the response
        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(301)
=======
        return (new Response())
            ->withStatus(301)
>>>>>>> refs/remotes/origin/main
            ->withHeader("Location", url("/dice"));
    }


    public function play(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("play.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> refs/remotes/origin/main

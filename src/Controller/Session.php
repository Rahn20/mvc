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
class Session
{
    public function index(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/session.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }


    public function destroy(): ResponseInterface
    {
        destroySession();

<<<<<<< HEAD
        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(301)
=======
        return (new Response())
            ->withStatus(301)
>>>>>>> refs/remotes/origin/main
            ->withHeader("Location", url("/session"));
    }
}

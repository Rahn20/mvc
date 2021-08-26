<?php

declare(strict_types=1);

namespace Rahn20\Controller;

<<<<<<< HEAD
//use Nyholm\Psr7\Response;
//use Nyholm\Psr7\Stream;
use Nyholm\Psr7\Factory\Psr17Factory;
=======
use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;
>>>>>>> refs/remotes/origin/main
use Psr\Http\Message\ResponseInterface;

use function Rahn20\Functions\renderView;

/**
 * Controller for the debug route.
 */
class Debug
{
    public function __invoke(): ResponseInterface
    {
        $body = renderView("layout/debug.php");

<<<<<<< HEAD
        //return (new Response())
        //    ->withStatus(200)
        //    ->withBody(Stream::create($body));

        // Create and return the response
        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
=======
        return (new Response())
            ->withStatus(200)
            ->withBody(Stream::create($body));
>>>>>>> refs/remotes/origin/main
    }
}

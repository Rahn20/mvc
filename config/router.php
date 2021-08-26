<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

<<<<<<< HEAD
$router = $router ?? new RouteCollector(
    new \FastRoute\RouteParser\Std(),
    new \FastRoute\DataGenerator\MarkBased()
);

//$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    //return "Testing response";
//});
=======
$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    return "Testing response";
});
>>>>>>> refs/remotes/origin/main

$router->addRoute("GET", "/", "\Rahn20\Controller\Index");
$router->addRoute("GET", "/debug", "\Rahn20\Controller\Debug");
$router->addRoute("GET", "/twig", "\Rahn20\Controller\TwigView");


$router->addGroup("", function (RouteCollector $router) {
    $router->addRoute("GET", "/dice", ["\Rahn20\Controller\Dice", "index"]);
    $router->addRoute("GET", "/dice/destroy", ["\Rahn20\Controller\Dice", "destroyDice"]);
    $router->addRoute("POST", "/play", ["\Rahn20\Controller\Dice", "play"]);
});


$router->addGroup("/yatzy", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Rahn20\Controller\Yatzy", "index"]);
    $router->addRoute("GET", "/destroy", ["\Rahn20\Controller\Yatzy", "destroyYatzy"]);
    $router->addRoute("POST", "/play", ["\Rahn20\Controller\Yatzy", "play"]);
});


$router->addGroup("/session", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Rahn20\Controller\Session", "index"]);
    $router->addRoute("GET", "/destroy", ["\Rahn20\Controller\Session", "destroy"]);
});

$router->addGroup("/some", function (RouteCollector $router) {
    $router->addRoute("GET", "/where", ["\Rahn20\Controller\Sample", "where"]);
});

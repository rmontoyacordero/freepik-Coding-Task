<?php

use Modules\Country\Controllers\CountryCheckerController;

$rootDir = __DIR__;

require_once "{$rootDir}/src/autoload.php";

$container = new DI\ContainerBuilder();

$container->useAutowiring(true);
$container->useAnnotations(false);
$container->addDefinitions(include("{$rootDir}/src/diDefinitions.php"));
// $container->enableCompilation("{$rootDir}/cache");

$container = $container->build();

Slim\Factory\AppFactory::setContainer($container);

$app = Slim\Factory\AppFactory::create();

$countryCheckerController = $container->get(CountryCheckerController::class);

$app->get('/country-check/{countryCode}',
    function (
        \Slim\Psr7\Request $request,
        \Slim\Psr7\Response $response,
        $args
    ) use ($countryCheckerController) {
        $response->getBody()->write(json_encode($countryCheckerController->handle($args['countryCode'])));

        return $response;
    });

$app->run();

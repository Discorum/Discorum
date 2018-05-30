<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        return $container['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('An internal error occurred.');
    };
};

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('The page you were looking for was not found.');
    };
};

$container['HomeController'] = function($container) {
    return new \Discorum\Controller\HomeController($container);
};

require __DIR__ . '/routes.php';

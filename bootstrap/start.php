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
        return $container->view->render(
            $response->withStatus(500),
            'errors/500.twig',
            []
        );
    };
};

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container->view->render(
            $response->withStatus(404),
            'errors/404.twig',
            []
        );
    };
};

$container['HomeController'] = function($container) {
    return new \Discorum\Controller\HomeController($container);
};

require __DIR__ . '/routes.php';

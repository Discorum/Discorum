<?php

namespace Discorum\Controller;

class ErrorController extends BaseController
{
    public function notFoundError($request, $response)
    {
        return $this->view->render($response->withStatus(404), 'errors/404.twig');
    }

    public function serverError($request, $response)
    {
        return $this->view->render($response->withStatus(500), 'errors/500.twig');
    }
}

<?php

namespace Discorum\Controller;

class HomeController extends BaseController
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'index.twig');
    }
}

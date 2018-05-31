<?php

namespace Discorum\Controller;
require 'BaseController.php';

class HomeController extends BaseController
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'index.twig');
    }
}

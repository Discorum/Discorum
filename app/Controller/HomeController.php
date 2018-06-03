<?php 

namespace App\Controller;

use Discorum\Http\Controller\AbstractController;

class HomeController extends AbstractController
{
	public function index($request, $response)
	{
		return $this->view->render($response, 'index.twig');
	}
}
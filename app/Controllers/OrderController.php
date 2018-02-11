<?php

namespace Cart\Controllers;

use Slim\Views\Twig;
use Cart\Models\Product;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class OrderController{

  public function index(Request $request, Response $response, Twig $view){


    return $view->render($response, 'order/index.twig');
  }
}

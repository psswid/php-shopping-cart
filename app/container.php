<?php

use function DI\get;
use Cart\Basket\Basket;
use Slim\Views\Twig;
use Cart\Models\Product;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;
use Slim\Interfaces\RouterInterface;
use Cart\Support\Storage\SessionStorage;
use Cart\Support\Storage\Contracts\StorageInterface;

return [
  //'router'  => get(Slim\Router::class), <= as that, can't recognize router
  RouterInterface::class => function (ContainerInterface $c) { return $c->get('router'); },
  StorageInterface::class => function (ContainerInterface $c) { return new SessionStorage('cart'); },
  Twig::class => function(ContainerInterface $c){
    $twig = new Twig(__DIR__ . '/../resources/views', [
      'cache' => false
    ]);

    $twig->addExtension(new \Slim\Views\TwigExtension(
        $c->get('router'),
        $c->get('request')->getUri()
    ));

    $twig->getEnvironment()->addGlobal('basket', $c->get(Basket::class));

    return $twig;
  },
  Product::class => function(ContainerInterface $c){
    return new Product;

  },
  Basket::class => function(ContainerInterface $c){
    return new Basket(
      $c->get(SessionStorage::class),
      $c->get(Product::class)
    );
  }
];

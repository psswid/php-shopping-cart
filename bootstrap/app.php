<?php

use Cart\App;
use Slim\Views\Twig;
use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new App;

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
  'driver'  => 'mysql',
  'host'    => 'localhost',
  'database'=> 'cart',
  'username'=> 'admin',
  'password'=> 'admin',
  'charset' => 'utf8',
  'collation'=> 'utf8_unicode_ci',
  'prefix'  => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

//Just for learning purpose Braintree_Configuration lines are left like that. They should be packed in environment variables in .env files
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('bn37sx8nyd637y3y');
Braintree_Configuration::publicKey('b5nvk7nm2thq3s3p');
Braintree_Configuration::privateKey('4220c6ee29098b48b536467f6cf0fe98');

require __DIR__. '/../app/routes.php';


$app->add(new \Cart\Middleware\ValidationErrorsMiddleware($container->get(Twig::class)));

$app->add(new \Cart\Middleware\OldInputMiddleware($container->get(Twig::class)));

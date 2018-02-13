<?php

namespace Cart\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Braintree_ClientToken;

class BraintreeController{

  public function token(Response $response){

    // $clientToken = json_encode(Braintree_ClientToken::generate());
    //
    // $response = $clientToken;

    return $response->withJson([
      'token' => Braintree_ClientToken::generate(),
    ]);
  }
}

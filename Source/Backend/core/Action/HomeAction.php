<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

final class HomeAction
{

    public function __invoke(Request $request, Response $response, $args)
    {
        if (isset($args['name'])) {
            $name = $args['name'];
            $message = "Hello $name!";

        } else {
            $message = 'AFP-LEV-A REST API';
        }

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => ['message' => $message]
        ];

        return $response->withJson($jsonResponse);
    }
}
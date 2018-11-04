<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;


class UserController
{

    public static function fromToken(Request $request, Response $response, $args)  {
        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $request->getAttribute('decoded_token_data')
        ];

        return $response->withJson($jsonResponse);
    }

}
<?php

namespace Afp\Api\Controller;

use Slim\Http\Request;
use Slim\Http\Response;


class UserController
{
    private $_repo;


    public function __construct($repo)
    {
        $this->_repo = $repo;
    }

    public function user(Request $request, Response $response, $args)
    {
        $user = $this->_repo->findById($args['id']);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $user->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    public function fromToken(Request $request, Response $response, $args)
    {
        $id = $request->getAttribute('decoded_token_data')['id'];
        $user = $this->_repo->findById($id);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $user
        ];

        return $response->withJson($jsonResponse);
    }

}
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


    //TODO return appropriate error message
    public function user(Request $request, Response $response, $args)
    {
        $this->_repo->findById($args['id']);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    //TODO return appropriate error message
    public function fromToken(Request $request, Response $response, $args)
    {
        $id = $request->getAttribute('decoded_token_data')['id'];
        $this->_repo->findById($id);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' =>  $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

}
<?php

namespace Afp\Api\Controller;

use Slim\Http\Request;
use Slim\Http\Response;


class TopicController
{
    private $_repo;

    public function __construct($repo)
    {
        $this->_repo = $repo;
    }

    public function topic(Request $request, Response $response, $args)
    {
        $this->_repo->findById($args['id']);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    public function listAll(Request $request, Response $response, $args)
    {
        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->findAll()
        ];

        return $response->withJson($jsonResponse);
    }

    public function store(Request $request, Response $response, $args)
    {
        $input = $request->getParsedBody();
        $this->_repo->store($input);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    public function update(Request $request, Response $response, $args)
    {
        $input = $request->getParsedBody();
        $this->_repo->update($args['id'], $input);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $this->_repo->delete($args['id']);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => ''
        ];

        return $response->withJson($jsonResponse);
    }

}
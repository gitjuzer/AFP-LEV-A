<?php

namespace Afp\Api\Controller;

use Slim\Http\Request;
use Slim\Http\Response;


class ExerciseListController
{
    private $_repo;

    public function __construct($repo)
    {
        $this->_repo = $repo;
    }

    public function exerciseDilemma(Request $request, Response $response, $args)
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
        $teacher = isset($_GET['teacher']) ? $_GET['teacher'] : null;
        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->findAll($teacher)
        ];

        return $response->withJson($jsonResponse);
    }

    public function store(Request $request, Response $response, $args)
    {
        $input = $request->getParsedBody();
        $id = $request->getAttribute('decoded_token_data')['id'];
        $this->_repo->store($input, $id);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    public function assign(Request $request, Response $response, $args)
    {
        $input = $request->getParsedBody();
        $this->_repo->assign($input, $args['id']);

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $this->_repo->getInstance()->jsonSerialize()
        ];

        return $response->withJson($jsonResponse);
    }

    public function getAssigned(Request $request, Response $response, $args)
    {
        $this->_repo->findById($args['id']);
        $instance = $this->_repo->getInstance()->jsonSerialize();
        $list = $this->_repo->getAssigned($args['id']);

        $payload = [$instance, $list];

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $payload
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
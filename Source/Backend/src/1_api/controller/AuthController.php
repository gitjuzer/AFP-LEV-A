<?php

namespace Afp\Api\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;


class AuthController
{
    private $_settings;
    private $_repo;
    private $_input;

    public function __construct($settings, $repo)
    {
        $this->_settings = $settings;
        $this->_repo = $repo;
    }

    public function login(Request $request, Response $response, $args)
    {
        $this->_input = $request->getParsedBody();
        $this->_repo->findByEmail($this->_input['email']);

        if (!$this->validateUser()) {
            return $this->wrongCredentialsMessage($response);
        }

        $token = $this->generateToken();

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => [
                'token' => $token
            ]
        ];

        return $response->withJson($jsonResponse);
    }

    public function register(Request $request, Response $response, $args)
    {
        try {
            $this->_input = $request->getParsedBody();
            $id = $this->_repo->store($this->_input);

            $this->_repo->findById($id);

            if (!$this->validateUser()) {
                return $this->wrongCredentialsMessage($response);
            }

            $token = $this->generateToken();

            $jsonResponse = [
                'status' => 'success',
                'code' => $response->getStatusCode(),
                'payload' => [
                    'token' => $token
                ]
            ];
        } catch (\Exception $e) {
            $jsonResponse = [
                'status' => 'error',
                'code' => 401,
                'message' => $e->getMessage()
            ];
        }

        $code = (int)$jsonResponse['code'];

        return $response->withStatus(200)->withJson($jsonResponse);
    }

    private function validateUser()
    {
        $user = $this->_repo->getInstance();
        $password = $this->_input['password'];
        return $user && $user->verifyPassword($password);
    }

    private function wrongCredentialsMessage(Response $response)
    {
        return $response
            ->withStatus(200)
            ->withJson([
                'status' => 'error',
                'code' => 401,
                'message' => 'These credentials do not match our records.'
            ]);
    }

    private function generateToken()
    {
        $user = $this->_repo->getInstance();
        $token = JWT::encode([
            'id' => $user->id,
            'email' => $user->email,
            'type' => $user->type
        ],
            $this->_settings['jwt']['secret'],
            'HS256'
        );
        return $token;
    }
}
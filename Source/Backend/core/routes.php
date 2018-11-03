<?php

use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

$app->group('/api', function (\Slim\App $app) {
    $app->post('/login', function (Request $request, Response $response, array $args) {
        $input = $request->getParsedBody();
        $sql = 'SELECT * FROM user WHERE U_Email = :email';
        $sth = $this->db->prepare($sql);
        $sth->bindParam('email', $input['email']);
        $sth->execute();
        $user = $sth->fetchObject();

        if (!$user) {
            return $this->response
                ->withStatus(401)
                ->withJson([
                'status' => 'error',
                'code' => 401,
                'message' => 'These email credentials do not match our records.'
            ]);
        }

        if (!password_verify($input['password'], $user->U_Pass)) {
            return $this->response
                ->withStatus(401)
                ->withJson([
                'status' => 'error',
                'code' => 401,
                'message' => 'These password credentials do not match our records.'
            ]);
        }

        $settings = $this->get('settings');
        $token = JWT::encode(['id' => $user->U_ID, 'email' => $user->U_Email], $settings['jwt']['secret'], 'HS256');

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => [
                'token' => $token
            ]
        ];

        return $this->response->withJson($jsonResponse);
    });

    $app->post('/register', function (Request $request, Response $response, array $args) {
        $input = $request->getParsedBody();
        $sql = 'INSERT INTO user (U_LoginName, U_Name, U_Email, U_Pass) 
                  VALUES (:loginName, :realName, :email, :password)';
        $sth = $this->db->prepare($sql);
        $sth->bindParam('loginName', $input['loginName']);
        $sth->bindParam('realName', $input['realName']);
        $sth->bindParam('email', $input['email']);
        $pass = password_hash($input['password'], PASSWORD_DEFAULT);
        $sth->bindParam('password', $pass);
        $sth->execute();

        $sql = 'SELECT * FROM user WHERE U_Email = :email';
        $sth = $this->db->prepare($sql);
        $sth->bindParam('email', $input['email']);
        $sth->execute();
        $user = $sth->fetchObject();

        if (!$user) {
            return $this->response
                ->withStatus(401)
                ->withJson([
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'These email credentials do not match our records.'
                ]);
        }

        if (!password_verify($input['password'], $user->U_Pass)) {
            return $this->response
                ->withStatus(401)
                ->withJson([
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'These password credentials do not match our records.'
                ]);
        }

        $settings = $this->get('settings');
        $token = JWT::encode(['id' => $user->U_ID, 'email' => $user->U_Email], $settings['jwt']['secret'], 'HS256');

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => [
                'token' => $token
            ]
        ];

        return $this->response->withJson($jsonResponse);
    });
});

$app->group('/sapi', function (\Slim\App $app) {
    $app->get('/user', function (Request $request, Response $response, array $args) {
        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => $request->getAttribute('decoded_token_data')
        ];

        return $this->response->withJson($jsonResponse);

        /*output
        stdClass Object
            (
                [id] => 2
                [email] => arjunphp@gmail.com
            )

        */
    });

});



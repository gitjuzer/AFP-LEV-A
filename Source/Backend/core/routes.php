<?php

use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {

    if (!isset($args['name'])) {
        $response->getBody()->write('SlimFramework');
    } else {
        $name = $args['name'];
        $response->getBody()->write("Hello $name!");
    }
    return $response;
});

$app->group('/api', function (\Slim\App $app) {

    $app->post('/login', function (Request $request, Response $response, array $args) {

        $input = $request->getParsedBody();
        $sql = 'SELECT * FROM users WHERE email= :email';
        $sth = $this->db->prepare($sql);
        $sth->bindParam('email', $input['email']);
        $sth->execute();
        $user = $sth->fetchObject();

        if (!$user) {
            return $this->response->withJson(['error' => true, 'message' => 'These email credentials do not match our records.']);
        }

        if (!password_verify($input['password'], $user->password)) {
            return $this->response->withJson(['error' => true, 'message' => 'These password credentials do not match our records.']);
        }

        $settings = $this->get('settings');
        $token = JWT::encode(['id' => $user->id, 'email' => $user->email], $settings['jwt']['secret'], 'HS256');

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



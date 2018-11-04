<?php
namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

final class LoginAction
{
    private $db;
    private $settings;

    public function __construct(\PDO $db, $settings)
    {
        $this->db = $db;
        $this->settings = $settings;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $input = $request->getParsedBody();
        $sql = 'SELECT * FROM user WHERE U_Email = :email';
        $sth = $this->db->prepare($sql);
        $sth->bindParam('email', $input['email']);
        $sth->execute();
        $user = $sth->fetchObject();

        if (!$user) {
            return $response
                ->withStatus(401)
                ->withJson([
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'These email credentials do not match our records.'
                ]);
        }

        if (!password_verify($input['password'], $user->U_Pass)) {
            return $response
                ->withStatus(401)
                ->withJson([
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'These password credentials do not match our records.'
                ]);
        }

        $token = JWT::encode(['id' => $user->U_ID, 'email' => $user->U_Email], $this->settings['jwt']['secret'], 'HS256');

        $jsonResponse = [
            'status' => 'success',
            'code' => $response->getStatusCode(),
            'payload' => [
                'token' => $token
            ]
        ];

        return $response->withJson($jsonResponse);
    }
}
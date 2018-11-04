<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;


class RegisterAction
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
        try {
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
            $id = $this->db->lastInsertId();

            $token = JWT::encode(['id' => $id, 'email' => $input['email']], $this->settings['jwt']['secret'], 'HS256');

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

        return $response->withStatus($code)->withJson($jsonResponse);
    }

}
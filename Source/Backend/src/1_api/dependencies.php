<?php

use Afp\Api\Action\LoginAction;
use Afp\Api\Action\RegisterAction;
use Afp\Api\Controller\PracticeController;
use Afp\Shared\Factory\DaoFactoryFactory;
use Afp\Repository\UserRepository;
use Afp\Api\Controller\UserController;

$container = $app->getContainer();

$container['mysql'] = function ($c) {
    $settings = $c->get('settings')['mysql'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'].';charset=utf8',
        $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['daoFactory'] = function ($c) {
    $daoFactory = new DaoFactoryFactory($c);
    return $daoFactory::getFactory();
};

//TODO make factory, to decrease of the container number
//TODO create dirs, for factory types. Make it more simple.
$container['userRepository'] = function ($c) {
    $userRepository = new UserRepository($c->get('daoFactory'));
    return $userRepository;
};

$container[UserController::class] = function ($c) {
    return new UserController($c->get('userRepository'));
};

$container[LoginAction::class] = function ($c) {
    return new LoginAction($c->get('mysql'), $c->get('settings'));
};

$container[RegisterAction::class] = function ($c) {
    return new RegisterAction($c->get('mysql'), $c->get('settings'));
};

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $response->withStatus(404)->withJson([
            'status' => 'error',
            'code' => 404,
            'message' => 'Not Found',
        ]);
    };
};

$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        return $response->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withJson([
                'status' => 'error',
                'code' => 405,
                'message' => 'Method must be one of: ' . implode(',', $methods)
            ]);
    };
};

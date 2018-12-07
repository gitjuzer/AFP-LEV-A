<?php


use Afp\Shared\Factory\DaoFactory;
use Afp\Api\Controller\UserController;
use Afp\Api\Controller\AuthController;
use Afp\Api\Controller\TopicController;
use Afp\Api\Controller\CurriculumController;
use Afp\Api\Controller\ExerciseDilemmaController;
use Afp\Api\Controller\ExerciseListController;

$container = $app->getContainer();

$container['mysql'] = function ($c) {
    $settings = $c->get('settings')['mysql'];
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8;', $settings['host'], $settings['dbname']);
    $pdo = new PDO($dsn, $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['daoFactory'] = function ($c) {
    $daoFactory = new DaoFactory($c);
    return $daoFactory::getFactory();
};

$container[UserController::class] = function ($c) {
    $userRepository = new \Afp\Repository\UserRepository($c->get('daoFactory'));
    return new UserController($userRepository);
};

$container[AuthController::class] = function ($c) {
    $repo = new \Afp\Repository\UserRepository($c->get('daoFactory'));
    return new AuthController($c->get('settings'), $repo);
};

$container[TopicController::class] = function ($c) {
    $repo = new \Afp\Repository\TopicRepository($c->get('daoFactory'));
    return new TopicController($repo);
};

$container[CurriculumController::class] = function ($c) {
    $repo = new \Afp\Repository\CurriculumRepository($c->get('daoFactory'));
    return new CurriculumController($repo);
};

$container[ExerciseDilemmaController::class] = function ($c) {
    $repo = new \Afp\Repository\ExerciseDilemmaRepository($c->get('daoFactory'));
    return new ExerciseDilemmaController($repo);
};

$container[ExerciseListController::class] = function ($c) {
    $repo = new \Afp\Repository\ExerciseListRepository($c->get('daoFactory'));
    return new ExerciseListController($repo);
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

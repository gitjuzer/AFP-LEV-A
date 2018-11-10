<?php

use Slim\App;
use Afp\Api\Action\HomeAction;
use Afp\Api\Action\LoginAction;
use Afp\Api\Action\RegisterAction;
use Afp\Api\Controller\UserController;

$app->get('/user/{id}', UserController::class . ':user');

$app->get('/[{name}]', HomeAction::class);

$app->group('/api', function (App $app) {
    $app->post('/login', LoginAction::class);
    $app->post('/register', RegisterAction::class);
});

$app->group('/sapi', function (App $app) {
    $app->get('/user', UserController::class . ':fromToken');
});



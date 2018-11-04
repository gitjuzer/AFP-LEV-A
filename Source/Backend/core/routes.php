<?php

$app->get('/[{name}]', App\Action\HomeAction::class);

$app->group('/api', function (\Slim\App $app) {
    $app->post('/login',  App\Action\LoginAction::class);
    $app->post('/register', App\Action\RegisterAction::class);
});

$app->group('/sapi', function (\Slim\App $app) {
    $app->get('/user', 'App\Controller\UserController::fromToken');
});



<?php

use Slim\App;
use Afp\Api\Action\HomeAction;

$app->options('/[{path:.*}]',HomeAction::class);

$app->get('/[{name}]', HomeAction::class);

$app->group('/api', function (App $app) {
    $app->post('/login', Afp\Api\Controller\AuthController::class . ':login');
    $app->post('/register', Afp\Api\Controller\AuthController::class . ':register');
});

$app->group('/sapi', function (App $app) {
    $app->get('/user', Afp\Api\Controller\UserController::class . ':fromToken');
    $app->get('/user/{id}', Afp\Api\Controller\UserController::class . ':user');

    $app->post('/topic', Afp\Api\Controller\TopicController::class . ':store');
    $app->get('/topic/{id}', Afp\Api\Controller\TopicController::class . ':topic');
    $app->get('/topics', Afp\Api\Controller\TopicController::class . ':listAll');
    $app->put('/topic/{id}', Afp\Api\Controller\TopicController::class . ':update');
    $app->delete('/topic/{id}', Afp\Api\Controller\TopicController::class . ':delete');

    $app->post('/curriculum', Afp\Api\Controller\CurriculumController::class . ':store');
    $app->get('/curriculum/{id}', Afp\Api\Controller\CurriculumController::class . ':curriculum');
    $app->get('/curricula', Afp\Api\Controller\CurriculumController::class . ':listAll');
    $app->delete('/curriculum/{id}', Afp\Api\Controller\CurriculumController::class . ':delete');

    $app->post('/exerciseDilemma', Afp\Api\Controller\ExerciseDilemmaController::class . ':store');
    $app->get('/exerciseDilemma/{id}', Afp\Api\Controller\ExerciseDilemmaController::class . ':exerciseDilemma');
    $app->get('/exerciseDilemmas', Afp\Api\Controller\ExerciseDilemmaController::class . ':listAll');
    $app->delete('/exerciseDilemma/{id}', Afp\Api\Controller\ExerciseDilemmaController::class . ':delete');

    $app->post('/exerciseList', Afp\Api\Controller\ExerciseListController::class . ':store');
    $app->post('/exerciseList/{id}/assign', Afp\Api\Controller\ExerciseListController::class . ':assign');
    $app->get('/exerciseList/{id}', Afp\Api\Controller\ExerciseListController::class . ':exerciseDilemma');
    $app->get('/exerciseList/{id}/assigned', Afp\Api\Controller\ExerciseListController::class . ':getAssigned');
    $app->get('/exerciseLists', Afp\Api\Controller\ExerciseListController::class . ':listAll');
    $app->delete('/exerciseList/{id}', Afp\Api\Controller\ExerciseListController::class . ':delete');
});



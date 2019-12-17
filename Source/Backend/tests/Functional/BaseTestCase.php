<?php

namespace Tests\Functional;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    public static $db;
    public $app;

    protected $withMiddleware = true;

    public function __construct(){
        // Use the application settings
        $settings = require __DIR__ . '/../../src/1_api/config/config_test.php';

        // Instantiate the application
        $app = new App($settings);

        // Set up dependencies
        require __DIR__ . '/../../src/1_api/dependencies.php';

        // Register middleware
        if ($this->withMiddleware) {
            require __DIR__ . '/../../src/1_api/middleware.php';
        }

        // Register routes
        require __DIR__ . '/../../src/1_api/routes.php';

        self::$db = $app->getContainer()->get('mysql');
        $this->app = $app;
    }

    public function runApp($requestMethod, $requestUri, $requestData = null, $contentType = 'application/json', $token = null)
    {
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri,
                'CONTENT_TYPE' => $contentType,
                'HTTP_AUTHORIZATION'  => 'Bearer ' . $token,
            ]
        );
        $request = Request::createFromEnvironment($environment);
        if ($requestData !== null) {
            $request = $request->withParsedBody($requestData);
        }
        $response = new Response();
        $response = $this->app->process($request, $response);
        return $response;
    }
}

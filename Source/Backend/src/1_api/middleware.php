<?php

use \Tuupola\Middleware\JwtAuthentication;

$app->add(function ($request, $response, $next) {
    $contentType = $request->getContentType();
    if (strpos($contentType, 'application/json') === false) {
	if($request->isOptions()){

		
	
} else {
        return $response->withStatus(415)->withJson([
            'status' => 'error',
            'code' => 415,
            'message' => 'Unsupported Media Type',
        ]);
	}
    }
    $response = $next($request, $response);
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
	    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->add(new JwtAuthentication([
    'path' => '/sapi',
    'attribute' => 'decoded_token_data',
    'secret' => $container->get('settings')['jwt']['secret'],
    'algorithm' => ['HS256'],
    'secure' => true,
    'error' => function ($response, $arguments) {
        $data['status'] = 'error';
        $data['code'] = $response->getStatusCode();
        $data['message'] = $arguments['message'];
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));
<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(function ($request, $response, $next) {
    $contentType = $request->getContentType();
    if (strpos($contentType, 'application/json') === false) {
        return $response->withStatus(415)->withJson([
            'status' => 'error',
            'code' => '415',
            'message' => 'Unsupported Media Type.',
        ]);
    }
    $response = $next($request, $response);
    return $response;
});

$app->add(new \Tuupola\Middleware\JwtAuthentication([
    'path' => '/sapi',
    'attribute' => 'decoded_token_data',
    'secret' => $container->get('settings')['jwt']['secret'],
    'algorithm' => ['HS256'],
    'secure' => false,
    'error' => function ($response, $arguments) {
        $data['status'] = 'error';
        $data['code'] = $response->getStatusCode();
        $data['message'] = $arguments['message'];
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));
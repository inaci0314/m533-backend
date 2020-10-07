<?php

/* Config */
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = 'localhost';
$config['db']['user']   = 'user';
$config['db']['pass']   = 'password';
$config['db']['dbname'] = 'exampleapp';
/* Config END */

require '../../vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Http\Response as ErrorResponse;

$app = new \Slim\App(['settings' => $config]);

/* Dependencies */
$container = $app->getContainer();
// logger
$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

// db
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO(
        'mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'],
        $db['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};
/* Dependencies END */

/* Routes */
$app->get('/', function (Request $request, Response $response) {
    return $response->getBody()->write("hello");
});

$app->get('/hello[/{name}]', function (Request $request, Response $response, array $args) {
    if (isset($args['name'])) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
    } else {
        $response = new ErrorResponse(204);
    }

    return $response;
});

/* Routes END */

$app->run();

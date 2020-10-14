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
// home
$app->get('/', function (Request $request, Response $response) {
    return $response->getBody()->write("hello");
});

// search articles
$app->get('/search', function (Request $request, Response $response) {
    $params = $request->getQueryParams();
    $query = "";
    if (isset($params['query'])) {
        $query = $params['query'];
    }
    return $response->getBody()->write("Search results for '$query'");
});

// articles by category
$app->get('/articles/{categoryId}', function () {
});

// article details
$app->get('/article/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    return $response->getBody()->write("article $id");
});

// cart
$app->get('/cart', function () {
});

// checkout
$app->get('/checkout', function () {
});


/* Routes END */

// Run the app
$app->run();

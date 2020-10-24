<?php

/* Config */

$configfile = $_SERVER['DOCUMENT_ROOT'] . '/src/config/config.ini';
$test = parse_ini_file($configfile);

$config = $test;

/* Config END */

require '../../vendor/autoload.php';
require '../classes/data/sql/SqlConnectionManager.php';
require '../classes/data/sql/SqlCategoryRepository.php';

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
$db = $config['db'];
$container['connectionMgr'] = function ($c) {
    $db = $c["settings"]["db"];
    return new SqlConnectionManager($db['host'], $db['dbname'], $db['user'], $db['pass']);
};

/* Dependencies END */

/* Routes */

// test
$app->get('/', function (Request $request, Response $response) {
    return $response->getBody()->write("hello");
});

// get all categories
$app->get('/categories', function (Request $request, Response $response) {
    $connectionMgr = $this->connectionMgr;
    $categoryRepository = new SqlCategoryRepository($connectionMgr);

    $categories = $categoryRepository->getAllCategories();

    $res = array();
    foreach ($categories as $category) {
        $res[] = array(
            "id" => $category->getId(),
            "name" => $category->getName()
        );
    }

    return $response->getBody()->write(json_encode($res));
});

// get category by id
$app->get('/categories/{id}', function (Request $request, Response $response, $args) {
    $id = $args["id"];

    $connectionMgr = $this->connectionMgr;
    $categoryRepository = new SqlCategoryRepository($connectionMgr);

    $category = $categoryRepository->getCategoryById($id);

    $res = array();
    // If no category was found, return error code 404
    if (!isset($category)) {
        $response = $response->withStatus(404);
    } else {
        $res = array(
            "id" => $category->getId(),
            "name" => $category->getName()
        );

        $response->getBody()->write(json_encode($res));
    }

    return $response;
});

// articles by category
$app->get('/articles/{categoryId}', function (Request $request, Response $response, $args) {
    $categoryId = $args["categoryId"];
    return $response->getBody()->write("categoryId: $categoryId");
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

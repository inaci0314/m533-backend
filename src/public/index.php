<?php

// Allow the frontend application to use this API
header("Access-Control-Allow-Origin: http://localhost:4200");

#region Config
$configfile = $_SERVER['DOCUMENT_ROOT'] . '/src/config/config.ini';
$config = parse_ini_file($configfile);
#endregion

#region Required classes
require '../../vendor/autoload.php';
require '../classes/data/sql/SqlConnectionManager.php';
require '../classes/data/sql/SqlCategoryRepository.php';
require '../classes/data/sql/SqlArticleRepository.php';
#endregion

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App(['settings' => $config]);

#region Depedencies (containers)

$container = $app->getContainer();

// logger
$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

// db
$container['connectionMgr'] = function ($c) {
    $db = $c["settings"]["db"];
    return new SqlConnectionManager($db['host'], $db['dbname'], $db['user'], $db['pass']);
};

#endregion

#region Routes
$apiV1 = '/api/v1';

// test
$app->get('/', function (Request $request, Response $response) {
    return $response->getBody()->write("hello");
});

// Get all categories
$app->get("$apiV1/categories", function (Request $request, Response $response) {
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

// Get category by id
$app->get("$apiV1/categories/{id}", function (Request $request, Response $response, $args) {
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

// Update a category (TEST)
$app->put("$apiV1/categories/{id}", function (Request $request, Response $response, $args) {
    $id = $args["id"];

    $connectionMgr = $this->connectionMgr;
    $categoryRepository = new SqlCategoryRepository($connectionMgr);

    $category = $categoryRepository->getCategoryById($id);

    $input = $request->getParsedBody();
    $input["name"];

    return $this->response->withJson($input);
});

// Get all articles or get articles by category id
$app->get("$apiV1/articles", function (Request $request, Response $response) {
    $connectionMgr = $this->connectionMgr;
    $articleRepository = new SqlArticleRepository($connectionMgr);

    $category = $request->getQueryParam("category");
    if (isset($category))
        $articles = $articleRepository->getArticlesByCategory($category);
    else
        $articles = $articleRepository->getAllArticles();

    $res = array();
    $articleDef = $articleRepository->articleDef;
    foreach ($articles as $article) {
        foreach ($articleDef as $def => $func) {
            $art[$def] = $article->$func();
        }
        $res[] = $art;
    }

    return $response->getBody()->write(json_encode($res));
});

// Get article by id
$app->get("$apiV1/articles/{id}", function (Request $request, Response $response, $args) {
    $id = $args["id"];

    $connectionMgr = $this->connectionMgr;
    $articleRepository = new SqlArticleRepository($connectionMgr);

    $article = $articleRepository->getArticleById($id);

    $res = array();
    // If no article was found, return error code 404
    if (!isset($article)) {
        $response = $response->withStatus(404);
    } else {
        foreach ($articleRepository->articleDef as $def => $func) {
            $res[$def] = $article->$func();
        }

        $response->getBody()->write(json_encode($res));
    }

    return $response;
});
#endregion

// Run the app
$app->run();

<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/**
 * Controllers
 */
$router->namespace("Source\Controller");

/**
 * ProductController
 * index
 */
$router->group("product");
$router->get("/index", "ProductController:index");
$router->get("/getById", "ProductController:getById");
$router->post("/storage", "ProductController:storage");
$router->post("/update", "ProductController:update");
$router->post("/delete", "ProductController:delete");


/**
 * CategoryController
 * index
 */
$router->group("category");
$router->get("/index", "CategoryController:index");
$router->get("/getById", "CategoryController:getById");
$router->post("/storage", "CategoryController:storage");
$router->post("/update", "CategoryController:update");
$router->post("/delete", "CategoryController:delete");



/**
 * 
 */
// $router->group("ooops");
// $router->get("/{errcode}", "ProductController:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");
}
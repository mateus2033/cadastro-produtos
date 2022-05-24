<?php

namespace Source\Controller;

use Source\Repository\ProductRepository;

class ProductController
{
   
    public function index() 
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->indexProduct(); 
        var_dump($products);
    }

    public function getById()
    {
        $product = null;
        isset($_GET['id']) ? $product = $_GET['id'] : $product = 0;
        
        $productRepository = new ProductRepository();
        $result = $productRepository->getProduct((int) $product);
        var_dump($result);
    }

    public function storage()
    {
        isset($_POST['name'])        ? $name        = $_POST['name']               : $name        = null;
        isset($_POST['price'])       ? $price       = $_POST['price']              : $price       = null;
        isset($_POST['description']) ? $description = $_POST['description']        : $description = null;
        isset($_POST['code'])        ? $code        = (int) $_POST['code']         : $code        = null;
        isset($_POST['amount'])      ? $amount      = (int) $_POST['amount']       : $amount      = null;
        isset($_POST['category_id']) ? $category_id = (int) $_POST['category_id']  : $category_id = null;

        $product = array(
            'name' =>        $name,
            'code' =>        $code, 
            'price' =>       $price,
            'description' => $description,
            'amount' =>      $amount,
            'category_id' => $category_id
        );
        
        $productRepository = new ProductRepository();
        $result = $productRepository->storageProduct($product);
        var_dump($result);
    
    }

    public function update()
    {
        isset($_POST['name'])        ? $name        = $_POST['name']               : $name        = null;
        isset($_POST['price'])       ? $price       = $_POST['price']              : $price       = null;
        isset($_POST['description']) ? $description = $_POST['description']        : $description = null;
        isset($_POST['code'])        ? $code        = (int) $_POST['code']         : $code        = null;
        isset($_POST['amount'])      ? $amount      = (int) $_POST['amount']       : $amount      = null;
        isset($_POST['category_id']) ? $category_id = (int) $_POST['category_id']  : $category_id = null;
        isset($_POST['id'])          ? $id          = (int) $_POST['id']           : $id          = null;

        $product = array(
            'id'   =>        $id,
            'name' =>        $name,
            'code' =>        $code, 
            'price' =>       $price,
            'description' => $description,
            'amount' =>      $amount,
            'category_id' => $category_id
        );

        $productRepository = new ProductRepository();
        $result = $productRepository->updateProduct($product);
        var_dump($result);

    }

    public function delete()
    {
        isset($_POST['id']) ? $product = (int) $_POST['id'] : $product = 0;     
        $productRepository = new ProductRepository();

        $result = $productRepository->deleteProduct($product);
        var_dump($result);
    }
}

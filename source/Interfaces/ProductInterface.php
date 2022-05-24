<?php

namespace Source\Interfaces;

interface ProductInterface {


    public function indexProduct();
    public function getProduct(int $id);
    public function validProduct($data);
    public function storageProduct(array $data);
    public function updateProduct($data);
    public function deleteProduct($data);

}
<?php

namespace Source\ConnectionLayer;

use PDO;

class ConnectionLayer
{

    private $dsn = 'mysql:host=localhost;dbname=webjump';
    private $user = 'root';
    private $pass = '123456';

    public function findAllProduct()
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = 'select * from products pro';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function findAllCategory()
    {

        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = 'select * from category cat';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

    }

    public function findProduct(int $id)
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = 'select * from products pro where pro.id ='.$id;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function create(array $data)
    {
       
        $pdo  = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "insert into products (name, price, description, code, amount, category_id) values ('".$data['name']."','".$data['price']."','".$data['description']."' ,'".$data['code']."' ,'".$data['amount']."','".$data['category_id']."')";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt;        
    }

    public function update(array $data)
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "update products set name = '".$data['name']."', price = '".$data['price']."',description = '".$data['description']."' ,code = '".$data['code']."' ,amount = '".$data['amount']."' ,category_id = '".$data['category_id']."' where id = ".$data['id'];

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt;        
    }

    public function delete(int $id)
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "delete from products where id = ".$id;

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function findCategory(int $id)
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = 'select * from category where id ='.$id;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function createCategory(array $data)
    {
        $pdo  = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "insert into category (name, code) values ('".$data['name']."', '".$data['code']."')";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }

    public function categoryUpdate(array $data)
    {      
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "update category set name = '".$data['name']."', code = '".$data['code']." ' where id = ".$data['id'];
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt;        
    }

    public function categoryDelete(int $id)
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "delete from category where id = ".$id;

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function getRelationsProductCategory(int $category_id)
    {  
        $pdo = new PDO($this->dsn, $this->user, $this->pass);
        $sql = "select * from products where category_id =".$category_id;

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }



}

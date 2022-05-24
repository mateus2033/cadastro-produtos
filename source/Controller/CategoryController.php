<?php

namespace Source\Controller;

use Source\Repository\CategoryRepository;

class CategoryController {

    protected $categoryRepository;

    public function index()
    {
        $this->categoryRepository = new CategoryRepository();
        $categoies = $this->categoryRepository->indexAllCategory();
        var_dump($categoies);
    }

    public function getById()
    {
        $category = null;
        isset($_GET['id']) ? $category = (int) $_GET['id'] : $category = 0;

        $this->categoryRepository = new CategoryRepository();
        $result = $this->categoryRepository->getById($category);
        var_dump($result);
        
    }

    public function storage()
    {
        isset($_POST['name']) ? $name = (string) $_POST['name'] : $name = null;
        isset($_POST['code']) ? $code = (int) $_POST['code'] :    $code = 0;

        $array = array(
            'name' => $name,
            'code' => $code
        );

        $this->categoryRepository = new CategoryRepository();
        $result = $this->categoryRepository->storageCategory($array);
        var_dump($result);

    }

    public function update()
    {
        isset($_POST['name']) ? $name = (string) $_POST['name'] : $name = null;
        isset($_POST['code']) ? $code = (int) $_POST['code']    : $code = 0;
        isset($_POST['id'])   ? $id   = (int) $_POST['id']      : $id = 0;

        $array = array(
            'id'   => $id,
            'name' => $name,
            'code' => $code
        );

        $this->categoryRepository = new CategoryRepository();
        $result = $this->categoryRepository->updateCategory($array);
        var_dump($result);
    }

    public function delete()
    {
        $category = null;
        isset($_POST['id']) ? $category = (int) $_POST['id'] : $category = 0;

        $this->categoryRepository = new CategoryRepository();
        $result = $this->categoryRepository->deleteCategory($category);
        var_dump($result);

    }
}
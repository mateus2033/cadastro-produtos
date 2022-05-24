<?php

namespace Source\Repository;

use Exception;
use PDOException;
use Source\Enties\CategoryEntity;
use Source\Logs\Logs;
use Source\Model\Category;
use Source\utils\GenericMessage;

class CategoryRepository extends Category {


    public function indexAllCategory()
    {
        $categories = $this->findAllCategory();
        $result = json_encode($categories);
        Logs::logCategory('full search','info');
        return $result;
    }

    public function getById(int $id)
    {
        $category = $this->findCategory($id);
        if(!empty($category)){
            $result = json_encode($category);
            Logs::logCategory('category find','info');
            return GenericMessage::sucessMessage($result,"Operação realizada com sucesso.",200);
        } else {
            Logs::logCategory('category not found','error');
            return GenericMessage::errorMessage("Category não encontrado.", 404);  
        }
    }

    public function validCategory($data)
    {
        CategoryEntity::fromValidCategoryEntidade($data);
        return true;
    }

    public function storageCategory(array $data)
    {
        
        try{      
            $category = $this->validCategory($data);   
            $this->createCategory($data);
            Logs::logCategory('successfully created','info');
            return GenericMessage::sucessMessage(true,"Operação realizada com sucesso.",201);

        }catch(Exception $e){
            
            Logs::logCategory('save not complete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }catch(PDOException $e){

            Logs::logCategory('save not complete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        } 
    }

    public function updateCategory(array $data)
    {
        try{
            $product = $this->getById($data['id']); 
            if($product['code'] == 404){ 
                return GenericMessage::errorMessage(GenericMessage::$categoryNotFound, 404);
            }

            $product = $this->validCategory($data);   
            $this->categoryUpdate($data);
            Logs::logCategory('successfully updated','info');
            return GenericMessage::sucessMessage(true, "Operação realizada com sucesso.", 201);

        }catch(Exception $e){
            
            Logs::logProduct('update not complete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }catch(PDOException $e){

            Logs::logProduct('update not complete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }
    }

    public function deleteCategory(int $data)
    {
        try {
           
            $category = $this->getById($data); 
            if($category['code'] == 404){ 
                return GenericMessage::errorMessage(GenericMessage::$categoryNotFound, 404);
            }

            $product = $this->verifyRelationProduct($data);
            if($product == true){
                return GenericMessage::errorMessage(GenericMessage::$productRelationsExists, 406);
            }

            $this->categoryDelete($data);
            Logs::logCategory('successfully delete','info');
            return GenericMessage::sucessMessage(true, "Operação realizada com sucesso.", 200);

        } catch (Exception $e) {
          
            Logs::logProduct('error to delete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }catch(PDOException $e){

            Logs::logProduct('error to delete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        } 
    }


    public function getCategory(int $id)
    {  
        $category = $this->findCategory($id);
        if(!empty($category)){
            return true;
        } else {
            return false;    
        }    
    }

    public function verifyRelationProduct(int $category_id)
    {
       $productRelation = new ProductRepository();
       return $productRelation->getRelationsProductCategory($category_id);
    }

}
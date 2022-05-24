<?php


namespace Source\Repository;

use Exception;
use PDOException;
use Source\Enties\ProductEntity;
use Source\Interfaces\ProductInterface;
use Source\Model\Product;
use Source\utils\GenericMessage;
use Source\Logs\Logs;


class ProductRepository  extends Product implements ProductInterface
{


    public function indexProduct()
    {
        try {
            $products = $this->findAllProduct();
            $products = json_encode($products);
            Logs::logProduct('full search','info');
            return $products;
        } catch (Exception $e) {

            Logs::logProduct('search not complete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        } catch (PDOException $e) {
            Logs::logProduct('search not complete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }
    }

    public function getProduct(int $id)
    {
        $product = $this->findProduct($id);    
        if(!empty($product)){
            $result = json_encode($product);
            Logs::logProduct('product find','info');
            return GenericMessage::sucessMessage($result,"Operação realizada com sucesso.",200);
        } else {
            Logs::logProduct('product not found','error');
            return GenericMessage::errorMessage("Produto não encontrado.", 404);  
        }
    }

    public function validProduct($data)
    {
        ProductEntity::fromValidProductEntidade($data);
        return true;
    }

    public function storageProduct(array $data)
    {   
        try{      
            $product = $this->validProduct($data);   
            $this->create($data);
            Logs::logProduct('successfully created','info');
            return GenericMessage::sucessMessage(true,"Operação realizada com sucesso.",201);

        }catch(Exception $e){
            
            Logs::logProduct('save not complete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }catch(PDOException $e){

            Logs::logProduct('save not complete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        } 
    }


    public function updateProduct($data)
    {   
        try{

            $product = $this->getProduct($data['id']); 
            if($product['code'] == 404){ 
                return GenericMessage::errorMessage(GenericMessage::$productNotFound, 404);
            }

            $categoryRepository = new CategoryRepository();
            $category = $categoryRepository->getCategory($data['category_id']);    
            if($category == false){
                return GenericMessage::errorMessage(GenericMessage::$categoryNotFound, 404);
            }


            $product = $this->validProduct($data);   
            $this->update($data);
            Logs::logProduct('successfully updated','info');
            return GenericMessage::sucessMessage(true, "Operação realizada com sucesso.", 201);

        }catch(Exception $e){
            
            Logs::logProduct('update not complete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }catch(PDOException $e){

            Logs::logProduct('update not complete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        } 
    }

    public function deleteProduct($data)
    {
        try {
           
            $product = $this->getProduct($data); 
            if($product['code'] == 404){ 
                return GenericMessage::errorMessage(GenericMessage::$productNotFound, 404);
            }

            $this->delete($data);
            Logs::logProduct('successfully delete','info');
            return GenericMessage::sucessMessage(true, "Operação realizada com sucesso.", 200);

        } catch (Exception $e) {
            
            Logs::logProduct('error to delete:'. $e->getMessage() ,'error');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        }catch(PDOException $e){

            Logs::logProduct('error to delete:'. $e->getMessage() ,'critical');
            return GenericMessage::errorMessage($e->getMessage(), $e->getCode());
        } 
    }

    public function relationProductCategory(int $category_id)
    {
        $product = $this->getRelationsProductCategory($category_id);
        if(empty($product)){
            return true;
        } else {
            return false;    
        }  
    }
}

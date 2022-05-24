<?php

namespace Source\Enties;

use Exception;
use Source\Repository\CategoryRepository;
use Source\utils\GenericMessage;

/**
 *@property string $name
 *@property int    $code
 *@property double $price
 *@property string $description
 *@property int    $amount
 *@property bool   $valido
 */
class ProductEntity {



    public static function fromValidProductEntidade($data) : bool
    {  
        $self = new Self();
        $self->validarProduct($data);

        if($self->valido){
            return true;
        } else {
            return false;
        }
    }

    public function validarProduct($data)
    {
        $array = [];
        $array['name']        = $this->_name($data);
        $array['code']        = $this->_code($data);
        $array['price']       = $this->_price($data);
        $array['description'] = $this->_description($data);
        $array['amount']      = $this->_amount($data);
        $array['category_id'] = $this->_category($data);
      
        $array =  array_filter($array, function($data)
        {
            return $data != null;
        });

        $state = !empty($array);
        if($state)
        {
            $this->valido    = false;
        } else { 

            $this->valido    = true;
        }
    }


    /**
    * Valida as regras do campo name
    */
    private function _name($data)
    {
        if(is_null($data['name']))
        {
            throw new Exception("name".':'.GenericMessage::$required, 400);
        }

        if(!is_string($data['name']))
        {
            throw new Exception("name".':'.GenericMessage::$onlyString, 400);
        }

        return null;
    }

    /**
    * Valida as regras do campo code
    */
    private function _code($data)
    {
        if(is_null($data['code']))
        {
            throw new Exception("code".':'.GenericMessage::$required, 400);
        }

        if(!is_integer($data['code']))
        {
            throw new Exception("code".':'.GenericMessage::$onlyInteger, 400);
        }

        return null;
    }

    /**
    * Valida as regras do campo price
    */
    private function _price($data)
    {
        if(is_null($data['price']))
        {
            throw new Exception("price".':'.GenericMessage::$required, 400);
        }

        if(!is_numeric($data['price']))
        {
            throw new Exception("price".':'.GenericMessage::$onlyNumbers,400);
        }

        return null;

    }

    /**
    * Valida as regras do campo description
    */
    private function _description($data)
    {
        if(is_null($data['description']))
        {
            throw new Exception("description".':'.GenericMessage::$required, 400);
        }

        if(!is_string($data['description']))
        {
            throw new Exception("description".':'.GenericMessage::$onlyString, 400);
        }

        return null;
    }

    /**
    * Valida as regras do campo amount
    */
    private function _amount($data)
    {     
        if(is_null($data['amount']))
        {
            throw new Exception(GenericMessage::$required, 400);
        }

        if(!is_integer($data['amount']))
        {
            throw new Exception(GenericMessage::$onlyInteger, 400);
        }

        return null;
    }

    /**
    * Valida as regras do campo category_id
    */
    private function _category($data)
    {
        if(is_null($data['category_id']))
        {
            throw new Exception(GenericMessage::$required, 400);
        }

        if(!is_integer($data['category_id']))
        {
            throw new Exception(GenericMessage::$onlyInteger, 400);
        }

        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->getCategory($data['category_id']);
        if($category == false) 
        {
            throw new Exception(GenericMessage::$categoryNotFound, 404);
        } 

    }

}



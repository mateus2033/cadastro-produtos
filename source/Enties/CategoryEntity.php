<?php

namespace Source\Enties;

use Exception;
use Source\utils\GenericMessage;

/**
 *@property string $name
 *@property int    $code
 *@property bool   $valido
 */
class CategoryEntity {



    public static function fromValidCategoryEntidade($data) : bool
    {  
        $self = new Self();
        $self->validarCategory($data);

        if($self->valido){
            return true;
        } else {
            return false;
        }
    }

    public function validarCategory($data)
    {
        $array = [];
        $array['name']        = $this->_name($data);
        $array['code']        = $this->_code($data);
      
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

        if($data['code'] == 0)
        {
            throw new Exception("code".':'.GenericMessage::$required, 400);
        }

        if(!is_integer($data['code']))
        {
            throw new Exception("code".':'.GenericMessage::$onlyInteger, 400);
        }

        return null;
    }


}



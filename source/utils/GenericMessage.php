<?php

namespace Source\utils;

class GenericMessage {


    public static $onlyString = "Only Strings";
    public static $onlyNumbers = "Only Numbers";
    public static $onlyInteger = "Only Ineger";
    public static $required = "required";
    public static $categoryNotFound = "Category not found";
    public static $productNotFound  = "Product not found";
    public static $productRelationsExists = "Error deleting with active product association";



    /**
     * Retorna mensagem padrão de sucesso
     */
    public static function sucessMessage($data, string $message, int $code)
    {
        return ['data'=>$data, 'message'=>$message, 'code'=>$code];
    }

    /**
     * Retorna mensagem padrão de erro
     */
    public static function errorMessage(string $message,  $code)
    {
        return ['message'=>$message, 'code'=>$code];
    }

}
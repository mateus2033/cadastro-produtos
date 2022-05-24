<?php

namespace  Source\Logs;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Logs
{

    /**
     * Seta logs referente as ações de produto.
     */
    public static function logProduct($mensagem, $modo = 'info')
    {
        $logger = new Logger('logs');
        $logger->pushHandler(new StreamHandler(dirname(__FILE__) . './product.log'));

        switch ($modo) {

            case 'info':
                $logger->info($mensagem);
                break;

            case 'error':
                $logger->error($mensagem);
                break;

            case 'critical':
                $logger->critical($mensagem);
                break;

            case 'alert':
                $logger->alert($mensagem);
                break;

            default:
                $logger->info($mensagem);
        }
    }


    /**
     * Seta os logs referente as ações de category.
     */
    public static function logCategory($mensagem, $modo = 'info')
    {

        $logger = new Logger('logs');
        $logger->pushHandler(new StreamHandler(dirname(__FILE__) . './category.log'));

        switch ($modo) {

            case 'info':
                $logger->info($mensagem);
                break;

            case 'error':
                $logger->error($mensagem);
                break;

            case 'critical':
                $logger->critical($mensagem);
                break;

            case 'alert':
                $logger->alert($mensagem);
                break;

            default:
                $logger->info($mensagem);
        }
    }
}

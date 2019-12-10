<?php

namespace Generics;

use Helpers\Request;
use Helpers\Redirect;

class ExtendsRequestFormValidate extends Request
{
    /**
     * Extende a classe Request no metodo validate, podendo assim ser criadas validações especificas
     *
     * @param string $input
     * @param string $inputAlias
     * @param string $redirect
     * @param array $rules
     * @param integer $min
     * @param integer $max
     * @return void
     */
    public static function formValidate(string $input, string $inputAlias, string $redirect, array $rules, int $min = null, int $max = null)
    {
        $inputValue = self::input('name');
        if (in_array('validation_name', $rules)) {

            /**
             * Definindo a menssagem de falha da validação na extenção da classe Request::validate
             *
             * $msg = "validation message";
             * 
             * ou criar uma constante nos arquivos de idioma em Config/lang/
             * 
             * define('NAMEVALIDATION_VALIDATION', 'MSG VALIDATION')
             */


            /**
             * Definindo a menssagem de falha de validação no arquivo de tradução
             * metodo recomendado para quando a menssagem tem valores dinamicos
             * criar uma variavel global com a constante $_GLOBALS['NAMEVALIDATION_VALIDATION'] => 'MSG VALIDATION'
             * de preferencia em todos os arquivos de idiomas em Config/lang/
             *
             * $msg = strtr($GLOBALS['NAMEVALIDATION_VALIDATION'], [
             * ':atribute' => $inputAlias,
             *  ':min' => $min,
             *  ':max' => $max
             *   ]);
             */

            if ('validation condition') {
                Redirect::redirectWithMessage($redirect, $msg, true);
                exit;
            }
        }
        parent::formValidate($input, $inputAlias, $redirect, $rules, $min = null, $max = null);
    }
}

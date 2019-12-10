<?php

namespace Helpers;

use Illuminate\Database\Capsule\Manager as db;


/**
 * Classe de validação e sanitização de dados.
 * Validações possíveis:
 * Númerica;
 * Booleana;
 * Inteiro;
 * Flutuante;
 * String;
 * Nulo;
 * Array;
 * Permissão para escrita;
 * Permissão para leitura;
 * Email;
 * Sanitiza email;
 * Em array;
 * Positivo;
 * Negativo;
 * Existe email no banco de dados;
 * Cpf;
 * Cnpj;
 * Cartão de crédito retornando um array com a bandeira, o numero eo cvc;
 * Telefone;
 * Cep; 
 */
class Validation
{
    /**
     * Retorna true se o valor for numerico
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isNumber($value)
    {
        if (!is_numeric($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for booleano
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isBoolean($value)
    {
        if (!is_bool($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for inteiro
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isInteger($value)
    {
        if (!is_int($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for string
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isString($value)
    {
        if (!is_string($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for flutuante
     *
     * @param integer $value
     * @return boolean
     */
    public static function isFloat(int $value)
    {
        if (!is_float($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for nulo
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isNull($value)
    {
        if (!is_null($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for array
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isAarray($value)
    {
        if (!is_array($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o arquivo for possivel reescrever
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isWritable($value)
    {
        if (!is_writable($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o arquivo for possivel fazer leitura
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isReadable($value)
    {
        if (!is_readable($value)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for um Email valido
     *
     * @param string $value
     * @return boolean
     */
    public static function isEmail($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    /**
     * Sanitiza o email
     *
     * @param string $value
     * @return void
     */
    public static function sanitizeEmail($value)
    {
        if (self::isEmail($value) === false) {
            return false;
        }
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Retorna true se o valor existir no array informado
     *
     * @param mixed $value
     * @param array $arr
     * @return boolean
     */
    public static function hasInArray($value, array $arr)
    {
        if (!in_array($value, $arr)) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for positivo
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isPositive($value)
    {
        if (self::isNumber($value) === false) {
            return false;
        } elseif (self::isNumber($value) === true and $value < 0) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for negativo
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isNegative($value)
    {
        if (self::isNumber($value) === false) {
            return false;
        } elseif (self::isNumber($value) === true and $value > 0) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o email não existir nobanco de dados informado 
     *
     * @param string $value
     * @param string $tableName
     * @param string $emailField
     * @return void
     */
    public static function emailMatch($value, string $tableName, string $emailField)
    {
        if (self::isEmail($value) === false) {
            return false;
        }
        $value = self::sanitizeEmail($value);
        $helper = new Helper;
        $helper->illuminateDb();
        if (DB::table($tableName)->where($emailField, $value)->count() > 0 === true) {
            return false;
        }
        return true;
    }

    /**
     * Retorna true se o valor for um cpf valido
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isCpf($value)
    {
        // Extrai somente os números
        $value = preg_replace('/[^0-9]/is', '', $value);
     
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($value) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $value)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $value{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($value{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    /**
     * Retorna true se o valor for um cnpj valido
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isCnpj($value)
    {
        if (! isset($value) || isset($value) && empty($value)) {
            return false;
        }

        // Retorna só os números
        $value = preg_replace('/[^0-9]/', '', $value);

        /**
         * CNPJ tem 14 digitos, verifica se não é 14.
         * Verifica se foi informada uma sequência de digitos repetidos.
         */
        if (mb_strlen($value) != 14 || preg_match('/(\d)\1{13}/', $value)) {
            return false;
        }

        /**
         * Calculo para validar o CNPJ
         */
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $value{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($value{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $value{$i} * $j;

            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return (bool) ($value{13} == ($resto < 2 ? 0 : 11 - $resto));
    }

    /**
    * Função para validar cartões de crédito, com suporte a validação de CVC.
    *O primeiro parâmetro é o número do cartão e o segundo o CVC (opcional), os dados serão sanitizados, sendo filtrado somente os números.
    *A saida é um array de três posições, a primeira retorna false (em caso de erro) ou a bandeira, a segunda se o número do cartão é válido e a terceira se o CVC é válido.
    *
    * @param string $card
    * @param boolean $cvc
    * @return boolean
    */
    public static function isCredcard($card, $cvc=false)
    {
        $card = preg_replace("/[^0-9]/", "", $card);
        if ($cvc) {
            $cvc = preg_replace("/[^0-9]/", "", $cvc);
        }
    
        $cards = array(
                'visa'		 => array('len' => array(13,16),    'cvc' => 3),
                'mastercard' => array('len' => array(16),       'cvc' => 3),
                'diners'	 => array('len' => array(14,16),    'cvc' => 3),
                'elo'		 => array('len' => array(16),       'cvc' => 3),
                'amex'	 	 => array('len' => array(15),       'cvc' => 4),
                'discover'	 => array('len' => array(16),       'cvc' => 4),
                'aura'		 => array('len' => array(16),       'cvc' => 3),
                'jcb'		 => array('len' => array(16),       'cvc' => 3),
                'hipercard'  => array('len' => array(13,16,19), 'cvc' => 3),
        );
    
        
        switch ($card) {
            case (bool) preg_match('/^(636368|438935|504175|451416|636297)/', $card):
                $brand = 'elo';
            break;
    
            case (bool) preg_match('/^(606282)/', $card):
                $brand = 'hipercard';
            break;
    
            case (bool) preg_match('/^(5067|4576|4011)/', $card):
                $brand = 'elo';
            break;
    
            case (bool) preg_match('/^(3841)/', $card):
                $brand = 'hipercard';
            break;
    
            case (bool) preg_match('/^(6011)/', $card):
                $brand = 'discover';
            break;
    
            case (bool) preg_match('/^(622)/', $card):
                $brand = 'discover';
            break;
    
            case (bool) preg_match('/^(301|305)/', $card):
                $brand = 'diners';
            break;
    
            case (bool) preg_match('/^(34|37)/', $card):
                $brand = 'amex';
            break;
    
            case (bool) preg_match('/^(36,38)/', $card):
                $brand = 'diners';
            break;
    
            case (bool) preg_match('/^(64,65)/', $card):
                $brand = 'discover';
            break;
    
            case (bool) preg_match('/^(50)/', $card):
                $brand = 'aura';
            break;
    
            case (bool) preg_match('/^(35)/', $card):
                $brand = 'jcb';
            break;
    
            case (bool) preg_match('/^(60)/', $card):
                $brand = 'hipercard';
            break;
    
            case (bool) preg_match('/^(4)/', $card):
                $brand = 'visa';
            break;
    
            case (bool) preg_match('/^(5)/', $card):
                $brand = 'mastercard';
            break;
        }
    
        $cardData = $cards[$brand];
        if (!is_array($cardData)) {
            return array(false, false, false);
        }
    
        $valid     = true;
        $valid_cvc = false;
    
        if (!in_array(strlen($card), $cardData['len'])) {
            $valid = false;
        }
        if ($cvc and strlen($cvc) <= $cardData['cvc'] and strlen($cvc) !=0) {
            $valid_cvc = true;
        }
        return array($brand, $valid, $valid_cvc);
    }

    /**
     * Retorna true se o valor for telefone valido
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isTelphone($value)
    {
        if (preg_match('/^\([0-9]{2}\)?\s?[0-9]{4,5}-[0-9]{4}$/', $value)){
            return true;
        }
        return false;
    }

    /**
     * Retorna true se o valor for um cep valido
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isCep($value)
    {
        if (preg_match('/[0-9]{5,5}([-]?[0-9]{3})?$/', $value)){
            return true;
        }
        return false;
    }
}

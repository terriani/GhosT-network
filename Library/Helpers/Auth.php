<?php

namespace Helpers;

class Auth
{
    /**
     * Metodo construtor que valida o login ou redireciona para o logout
     */
    public static function authValidation()
    {
        if (
            isset($_SESSION['id'])
            and !empty($_SESSION['id'])
            and isset($_SESSION['statusLog'])
            and !empty($_SESSION['statusLog'])
            and $_SESSION['statusLog'] === true
        ) {
            if(!empty($_SESSION['ownerSession'])){
                Session::sessionTokenValidade();
            }
            return true;
        } else {
            $_SESSION['id'] = null;
            $_SESSION['statusLog'] = false;
            return false;
        }
    }
}

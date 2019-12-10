<?php

namespace Helpers;

class Session
{
    /**
     * Cria um token de segurança para a sessão
     *
     * @return void
     */
    public static function sessionTokenGenerate()
    {
        if (empty($_SESSION['ownerSession'])) {
            $_SESSION['ownerSession'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
        }
    }

    /**
     * Testa a validade do token de sessão
     *
     * @return void
     */
    public static function sessionTokenValidade()
    {
        $token  = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
        if (!empty($_SESSION['ownerSession']) and $_SESSION['ownerSession'] == $token) {
            return true;
        } else {
            Redirect::redirectTo('404');
        }
    }

    /**
     * Seta um valor em uma determianada variavel de sessão
     *
     * @param string $name
     * @param string $value
     * @return void
     */
    public static function setSession(string $sessionName, string $value)
    {
        return $_SESSION[$sessionName] = $value;
    }

    /**
     * Recupera o valor de uma variavel de sessão dado o nome dela
     *
     * @param string $sessionName
     * @return void
     */
    public static function getSession(string $sessionName)
    {
        return $_SESSION[$sessionName];
    }

    /**
     * Recupera e apaga o valor de uma variavel de sessão
     *
     * @param string $sessionName
     * @return void
     */
    public static function getAndEraseSession(string $sessionName)
    {
        echo $_SESSION[$sessionName];
        return $_SESSION[$sessionName] = '';
    }

    /**
     * Destroi uma variavel de sessão
     *
     * @param string $sessionName
     * @return void
     */
    public static function sessionDestroy(string $sessionName)
    {
        unset($_SESSION[$sessionName]);
    }
}

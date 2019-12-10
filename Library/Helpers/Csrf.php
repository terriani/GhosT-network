<?php

namespace Helpers;

class Csrf
{

    /**
     * Cria um token para proteção csrf
     *
     * @return void
     */
    public static function csrfTokengenerate()
    {
        if (!isset($_SESSION['csrfToken'])) {
            $_SESSION['csrfToken'] = md5(uniqid(rand(), true));
        }
    }

    /**
     * Cria um campo do tipo hidden com o value possuindo um token csrf
     *
     * @return void
     */
    public static function csrfTokenField()
    {
        self::csrfTokengenerate();
        echo "<input type='hidden' name='csrfToken' value=".$_SESSION['csrfToken'].">";
        return true;
    }

    /**
     * Valida o token csrf
     *
     * @return void
     */
    public static function csrfTokenValidate()
    {
        if (!isset($_SESSION['csrfToken']) or empty($_SESSION['csrfToken'])) {
            return false;
        }
        if (!isset($_REQUEST['csrfToken']) or empty($_REQUEST['csrfToken'])) {
            return false;
        }
        if (isset($_SESSION['csrfToken']) and !empty($_SESSION['csrfToken']) and isset($_REQUEST['csrfToken']) and !empty($_REQUEST['csrfToken']) and $_REQUEST['csrfToken'] === $_SESSION['csrfToken']) {
            return true;
        } else {
            return false;
        }
    }
}

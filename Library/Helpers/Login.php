<?php

namespace Helpers;

use Illuminate\Database\Capsule\Manager as db;

class Login
{

    /**
     * Gera a sessão de logado do usuario
     *
     * @param string $id
     * @param string $email
     * @return void
     */
    private static function sessionLoginGenerate(int $id, string $email)
    {
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['statusLog'] = true;
    }

    /**
     * Destroi a sessão atual do usuaio
     *
     * @return void
     */
    public static function sessionLoginDestroy()
    {
        $_SESSION['id'] = "";
        $_SESSION['email'] = "";
        $_SESSION['statusLog'] = false;        
    }

    /**
     * Destroy a sessão logada e redireciona o usuario
     *
     * @param string $viewName
     * @return void
     */
    public static function sessionLoginDestroyWithRedirect(string $viewName = HOME)
    {
        $_SESSION['id'] = "";
        $_SESSION['email'] = "";
        $_SESSION['statusLog'] = false;
        return Redirect::redirectTo($viewName);
    }

    /**
     * Criptografa a senha do usuario
     *
     * @param string $pass
     * @return void
     */
    public static function passwordHash($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }


    /**
     * Testa se o email cadastrado existe no banco de dados
     *
     * @param string $email
     * @param string $pass
     * @return void
     */
    public static function loginValidate($email, $pass, $table = 'users', $emailField = 'email', $passwordField = 'password', $idField = 'id')
    {
        $helper = new Helper;
        if (Csrf::csrfTokenValidate() === true) {
            $helper->illuminateDb();
            $storageEmail = DB::table($table)->where($emailField, $email)->value($emailField);
            if ($storageEmail == $email) {
                $storagePass = DB::table($table)->where($emailField, $email)->value($passwordField);
                if (password_verify($pass, $storagePass)) {
                    $id = DB::table($table)->where($emailField, $email)->value($idField);
                    self::sessionLoginGenerate($id, $storageEmail);
                    return true;
                } else {
                    self::sessionLoginDestroy();
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

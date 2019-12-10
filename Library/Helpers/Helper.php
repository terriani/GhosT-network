<?php

namespace Helpers;

use Carbon\Carbon;

class Helper
{
    /**
     * Metodo que instancia a classe Auth
     *
     * @return void
     */
    public static function auth()
    {
        return new Auth;
    }

    /**
     * Metodo que instancia a classe externa Carbon
     *
     * @return void
     */
    public function date()
    {
        return new Carbon;
    }

    /**
     * Metodo que instancia a classe IlluminateDatabase
     *
     * @return void
     */
    public function illuminateDb()
    {
        return new IlluminateDatabase;
    }

    
    /**
     * Metodo que instancia a classe PDODatabase
     *
     * @return void
     */
    public function pdoDb()
    {
        return new PDODatabase;
    }

}
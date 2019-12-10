<?php

namespace Helpers;

/**
 * Ajuda com tarefas rotieniras do CLI
 */
class Cli
{
    /**
     * mostra uma mensagem iniando em uma nova linha
     *
     * @param string $msg
     * @return void
     */
    public static function println($msg)
    {
        echo $msg.PHP_EOL;
    }

    /**
     * Mostra uma mensagem e espera um parametro de entrada
     *
     * @param string $msg
     * @return string
     */
    public static function getParam($msg)
    {
        echo $msg.PHP_EOL;
        $param = fgets(STDIN);
        $param = trim($param);
        return $param;
    }
}
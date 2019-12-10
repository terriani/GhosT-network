<?php 

namespace Helpers;

class Redirect
{

    /**
     * Executa um redirecionamento para a url indicada
     *
     * @param string $url
     * @return void
     */
    public static function redirectTo(string $url)
    {
        return header("Location:".BASE_URL."$url");
    }

    /**
     * Retorna a quantidade de paginas informada no metodo
     * caso não seja informado um valor, retorna para a pagina anterior 
     *
     * @param integer $value
     * @return void
     */
    public static function redirectBack(int $value = -1)
    {
        echo "<script>window.history.go($value)</script>"; 
    }

    
   /**
     * Redireciona passando uma msg via url
     *
     * @param string $url
     * @param string $msg
     * @param string $type
     * @return void
     */
    public static function redirectWithMessage($url, $title, $msg, $type = '')
    {
        $title = base64_encode($title);
        $msg = base64_encode($msg);
        $type = base64_encode($type);
        header("Location:$url?type=$type&msg=$msg");
    }
}

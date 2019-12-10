<?php

namespace Helpers;

class FlashMessage
{
    /**
     * Exibe uma msg no tipo Toast para o usuário
     *
     * @param string $title
     * @param string $body
     * @param string $type
     * @return void
     */
    public static function toast(string $title, string $body, string $type = "show")
    {
        require_once "App/Views/Templates/Header.twig";
        $msg = <<<HTML
        <script>
            iziToast.$type({
                title: "$title",
                message: "$body",
                position: "topRight"

            });
        </script>
HTML;
        echo $msg;
    }

    /**
     * Exibe uma menssagem no tipo Toast para o usuario e faz o redirecionamento do mesmo
     *
     * @param string $title
     * @param string $body
     * @param string $type
     * @param string $url
     * @return void
     */
    public static function toastWithHref(string $title, string $body, string $type = "show", string $url)
    {
        require_once "App/Views/Templates/Header.twig";
        $url = BASE_URL . $url;
        $msg = <<<HTML
        <script>
            iziToast.$type({
                title: "$title",
                message: "$body",
                position: "topRight",
                onClosing: function(){
                    window.location.href="$url";
                }
            });
        </script>
HTML;
        echo $msg;
    }

    /**
     * Exibe uma menssagem no tipo Toast para o usuario e faz o redirecionamento do mesmo
     *
     * @param string $title
     * @param string $body
     * @param string $type
     * @param integer $value
     * @return void
     */
    public static function toastWithGoBack(string $title, string $body, string $type = "show", int $value = -1)
    {
        require_once "App/Views/Templates/Header.twig";
        $msg = <<<HTML
        <script>
           iziToast.$type({
                title: "$title",
                message: "$body",
                position: "topRight",
                onClosing: function(){
                    window.history.go($value);
                }
            });
        </script>
HTML;
        echo $msg;
    }

    /**
     * Exibe uma msg no tipo Toast para o usuário
     *
     * @param string $title
     * @param string $body
     * @param string $type
     * @return void
     */
    public static function modal(string $title, string $body, string $type = "show")
    {
        require_once "App/Views/Templates/Header.twig";
        $msg = <<<HTML
        <script>
            Swal.fire({
                title: '$title',
                text: '$body',
                type: '$type'
            })
        </script>
HTML;
        echo $msg;
    }

    /**
     * Exibe uma menssagem no tipo Toast para o usuario e faz o redirecionamento do mesmo
     *
     * @param string $title
     * @param string $body
     * @param string $type
     * @param string $url
     * @return void
     */
    public static function modalWithHref(string $title, string $body, string $type = "show", string $url)
    {
        require_once "App/Views/Templates/Header.twig";
        $url = BASE_URL . $url;
        $msg = <<<HTML
        <script>
            Swal.fire({
                title: '$title',
                text: '$body',
                type: '$type',
            }).then(function (result) {
                        if (result.value) {
                        window.location = "$url";
  }
});
        </script>
HTML;
        echo $msg;
    }

    /**
     * Exibe uma menssagem no tipo Toast para o usuario e faz o redirecionamento do mesmo
     *
     * @param string $title
     * @param string $body
     * @param string $type
     * @param integer $value
     * @return void
     */
    public static function modalWithGoBack(string $title, string $body, string $type = "show", int $value = -1)
    {
        require_once "App/Views/Templates/Header.twig";
        $msg = <<<HTML
        <script>
            Swal.fire({
                title: '$title',
                text: '$body',
                type: '$type',
            }).then(function(result){
                window.history.go($value);
            })
        </script>
HTML;
        echo $msg;
    }

    /**
     * Exibe a menssagem passada pela url
     *
     * @param string $msg
     * @return void
     */
    public static function getUrlError()
    {
        if(!empty($_GET['msg'])){
            self::toast('Ok...', base64_decode($_GET['msg']), ''.base64_decode($_GET['type']).'');
            unset($_GET['msg']);
        }
    } 
}

<?php

use Helpers\Csrf;
use Helpers\Session;

session_start();
if(!file_exists('vendor/autoload.php')) 
die('Falha ao executar o autoload, por favor rode o comando composer install no termainal e recarregue a pagina novamente');
require_once 'vendor/autoload.php';
require_once 'Config/config.php';
require_once 'Library/Core/Minifier.php';
require_once 'Config/routes.php';
require_once 'Config/lang/'.SITE_LANG.'.php';
Session::sessionTokenGenerate();
// if(!Session::sessionTokenValidade()){
//     die('Opss... Algo saiu errado por favor tente novamente');
// }
Csrf::csrfTokengenerate();
$c = new Core\Core;
if (ENV === 'development') {
    $whoops = new \Whoops\Run;
    $errorPage = new Whoops\Handler\PrettyPageHandler();
    $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
    $errorPage->setPageTitle("Opss... Algo deu errado!");
    $errorPage->setEditor("vscode");
    $whoops->pushHandler($errorPage);
    $whoops->register();
}
$c->run();

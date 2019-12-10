<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'env.php';

if (ENV == 'development') {

     //Url base para caso o controller não seja indicado na url
     define("HOME", "home");

     //define o nome do site em desenvolvimento
     define('SITE_NAME', 'ghost-network');

     //define o idioma das menssagens exibidas automaticamente pelo o frameowok em desenvolvimento
     define('SITE_LANG', 'pt_br');

    //Define o nome do banco de dados a ser usado em desenvolvimento
    define('DB_NAME', 'photoDb');

    //Define o usuário do banco de dados em desenvolvimento 
    define('DB_USER', 'root');

    //Define a senha do usuário do banco de dados em desenvolvimento
    define('DB_PASS', '');

    //Define o driver de banco de dados
    define('DB_DRIVER', 'mysql');

    //Define o host do banco de dados em desenvolvimento
    define('DB_HOST', '127.0.0.1');

    //Define o charset para utf8 
    define('CHARSET', 'utf8');

    //Define a collation para utf8 general ci
    define('COLLATION', 'utf8_unicode_ci');
    
    //define a url base do sistema
    define("BASE_URL", "http://localhost/".SITE_NAME."/");

    //define a url para a pasta node_modules
    define("NODE_MODULES", "http://localhost/".SITE_NAME."/node_modules/");

    //define a url para a pasta assets
    define("ASSET", "http://localhost/".SITE_NAME."/Public/assets/");

    //Define o endereço do servidor de email a ser utilizado em modo de desenvolvimento 
    define('SMTP', 'smtp.gmail.com');

    //Define o usuario do servidor de email em modo de desenvolvimento
    define('SMTP_USER', '');

    //Define a senha do usuario do servidor de email em modo de desenvolvimento 
    define('SMTP_PASS', '');

    //define a porta do servidor de email em modo de desenvolvimento
    define('SMTP_PORT', '465');

    //Define o certificado a ser usuado no tranporte do email ex: ssl ou tls em modo de desenvolvimento
    define('SMTP_CETTIFICATE', 'ssl');

    error_reporting(E_ALL);
    
} elseif (ENV == 'production') {

    //Url base para caso o controller não seja indicado na url
    define("HOME", "home");

     //define o nome do site em produção
     define('SITE_NAME', 'ghost-network');

      //define o idioma das menssagens exibidas automaticamente pelo o frameowok em produção
      define('SITE_LANG', 'pt_br');

    //Define o nome do banco de dados a ser usado em produção
    define('DB_NAME', 'u924719103_photoDb');

    //Define o usuário do banco de dados em produção 
    define('DB_USER', 'u924719103_terriani');

    //Define a senha do usuário do banco de dados em produção
    define('DB_PASS', 'terriani020989');

    //Define o driver de banco de dados
    define('DB_DRIVER', 'mysql');

    //Define o host do banco de dados em desenvolvimento
    define('DB_HOST', 'localhost');

    //Define o charset para utf8 
    define('CHARSET', 'utf8');

    //Define a collation para utf8 general ci
    define('COLLATION', 'utf8_unicode_ci');

     //define a url base do sistema
    define("BASE_URL", "/");

    //define a url para a pasta assets
    define("ASSET", "/Public/assets/");

    //define a url para a pasta node_modules
    define("NODE_MODULES", "/node_modules/");

    //Define o endereço do servidor de email a ser utilizado em modo de produção
    define('SMTP', 'smtp.gmail.com');

    //Define o usuario do servidor de email em modo de produção
    define('SMTP_USER', '');

    //Define a senha do usuario do servidor de email em modo de produção 
    define('SMTP_PASS', '');

    //define a porta do servidor de email em modo de produção
    define('SMTP_PORT', '465');

    //Define o certificado a ser usuado no tranporte do email ex: ssl ou tls em modo de produção
    define('SMTP_CETTIFICATE', 'ssl');

    error_reporting(0);
}

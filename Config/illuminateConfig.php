<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

use Illuminate\Database\Capsule\Manager as db;
$capsule = new db;

    $capsule->addConnection([
        'driver'    => DB_DRIVER,
        'host'      => DB_HOST,
        'database'  => DB_NAME,
        'username'  => DB_USER,
        'password'  => DB_PASS,
        'charset'   => CHARSET,
        'collation' => COLLATION,
        'prefix'    => '',
    ]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

<?php
require_once 'Config/config.php';
require_once 'Config/env.php';
return [
    'paths' => [
        'migrations' => __DIR__.'/db/migrations',
        'seeds' => __DIR__.'/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations_log',
        'default_database' => 'development',
        'development' => [
            'adapter' => DB_DRIVER,
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASS,
            'port' => 3306,
            'charset' => CHARSET
        ],
    'production' => [
        'adapter' => DB_DRIVER,
        'host' => DB_HOST,
        'name' => DB_NAME,
        'user' => DB_USER,
        'pass' => DB_PASS,
        'port' => 3306,
        'charset' => CHARSET
    ]
    ],
    'version_order' => 'creation'
];

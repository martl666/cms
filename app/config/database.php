<?php

use Illuminate\Database\Capsule\Manager as Capsule;  

$capsule = new Capsule;

$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'kunden',
    'username'  => 'root',
    'password'  => 'vagrant',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));

var_dump($capsule->getConnection()->getPdo());
$capsule->bootEloquent();
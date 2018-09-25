<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 25.09.2018
 * Time: 20:36
 */

namespace config;


class DB
{
    public function getEloquentObject() {

        $capsule = new \Illuminate\Database\Capsule\Manager;

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

        $capsule->bootEloquent();

        return $capsule;
    }
}
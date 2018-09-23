<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 20.09.2018
 * Time: 12:04
 */
ini_set("display_errors", 1);

spl_autoload_register( function( $class ){
    $path = str_replace( "\\",DIRECTORY_SEPARATOR, $class );
    $dir = "app".DIRECTORY_SEPARATOR;
    $includeFile = sprintf("%s%s.php", $dir, $path );

    if( file_exists( $includeFile ) )
        require_once $includeFile;

});
require 'vendor/autoload.php';
require_once "config/database.php";
require_once "app/debug/debugbar.php";

$customer = model\kunden::find(1)->get();

echo "<pre>" . print_r( $customer, true ) . "</pre>";
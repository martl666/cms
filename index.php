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
define( "BASE_PATH", __dir__ );

require 'vendor/autoload.php';

$db = new config\DB;
$db = $db->getEloquentObject();

$debugbar = new DebugBar\StandardDebugBar();
$debugbar->addCollector(new Util\PHPDebugBarEloquentCollector( $db ));
$debugbarRenderer = $debugbar->getJavascriptRenderer("/cms/vendor/maximebf/debugbar/src/DebugBar/Resources/");

$blade = new \Jenssegers\Blade\Blade( sprintf("%s%s%s", BASE_PATH, DIRECTORY_SEPARATOR, "app".DIRECTORY_SEPARATOR."View"), sprintf("%s%s%s", BASE_PATH, DIRECTORY_SEPARATOR, "Storage".DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."Cache") );
//$customer = model\kunden::find(2);
$address1 = model\adresse::where("kunden_id", 1)->with("addressDetails", "customer")->get();
//$address = model\adress_zusatz::find(2)->with(["address"])->get();
echo $address1;
//echo "<pre>" . print_r( $address, true ). "</pre>";
echo $blade->render("Main.html", [ "debugbarHead" => $debugbarRenderer->renderHead(), "customer" => $address1, "debugbarBody" => $debugbarRenderer->render()]);


//require_once "app/Util/debugbar.php";

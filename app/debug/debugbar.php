<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22.09.2018
 * Time: 21:21
 */

use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$db_call_pdo = new DebugBar\DataCollector\PDO\TraceablePDO( new \PDO( "mysql:host=127.0.0.1;dbname=kunden;charset=utf8;", "root", "vagrant"));
$debugbar->addCollector( new \DebugBar\DataCollector\PDO\PDOCollector( $db_call_pdo ) );
$db_call_pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
$debugbarRenderer = $debugbar->getJavascriptRenderer("/cms/vendor/maximebf/debugbar/src/DebugBar/Resources/");

//$debugbar["messages"]->addMessage("hello world!");
?>
<html>
<head>
    <?php echo $debugbarRenderer->renderHead(); ?>
</head>
<body>

<?php echo $debugbarRenderer->render(); ?>
</body>
</html>
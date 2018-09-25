<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22.09.2018
 * Time: 21:21
 */

use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbar->addCollector(new PHPDebugBarEloquentCollector());
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
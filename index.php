<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../framework/yii.php';

$environmentOs = isset($_SERVER['ENVIRONMENT_OS']) ? $_SERVER['ENVIRONMENT_OS'] : false;

if($environmentOs == 'win')
{
	$config=dirname(__FILE__).'/protected/config/main-win.php';
}
else
{
	$config=dirname(__FILE__).'/protected/config/main.php';
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

<?php
// This is global bootstrap for autoloading

//fitxers necessaris per autocargar yii
require('/../vendor/autoload.php');
require('/../vendor/yiisoft/yii2/Yii.php');

$config = require('config/web.php');

(new yii\web\Application($config));
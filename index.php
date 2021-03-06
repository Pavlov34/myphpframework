<?php

define('VG_ACCESS', true);

header( string: 'Content-Type:text/html;charset=utf-8' );
session_start();

require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';
require_once 'libraries/functions.php'; // подключаем файл функции распечатывания массива

use core\base\exceptions\RouteException;
use core\base\controllers\RouteController;

try {
    RouteController::getInstance()->route();
}
catch (RouteException $e){
    exit($e->getMessage());
}
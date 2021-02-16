<?php

namespace core\base\controllers; // импортируем пространство имен

use core\base\settings\Settings;
use core\base\settings\ShopSettings;

class RouteController
{
    static private $_instance;

    private function __clone()
    {
    }

    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

        return self::$_instance = new self;
    }

    private function __construct() // создаем обьект класса для распечатывания массива (пример)
    {
        $s = Settings::get('routes');
        $sl = ShopSettings::get('property1');
        exit();
    }
}
<?php

namespace core\base\settings;

class Settings
{
    static private $_instanse:

    private $routes = [
        'admin' => [
            'name' => 'admin',
            'path' => 'core/admin/controller/',
            'hrUrl' => false
        ],
        'settings' => [
            'path' => 'core/base/settings/'
        ],
        'plugins' => [
            'path' =>
        ],
        'user' => [
            'path' => 'core/user/controller',
            'hrUrl' => true,
            'routes' => [

            ]
        ],
        'default' => [
            'controller' => 'IndexController',
            'inputMethod' => 'inputData',
            'outputMethod' => 'outputData'
        ]
    ];

        private function __construct()
        {
        }

        private function __clone()
        {
        }

        static public function get ($property){
            return self::instanse()->$property;
        }

        static public function instance(){
            if(self::$_instanse instanceof self){
                return self::$_instanse;
            }

            return self::$_instanse = new self;
        }

}
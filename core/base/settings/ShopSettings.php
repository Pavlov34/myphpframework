<?php
// плагин это система расширения над основной системой

namespace core\base\settings;


class ShopSettings extends Settings // Наследуемся от основного класса. эти настройки расширяют основные настройки.
{

    static private $_instance; //

    private $templateArr = [
        'text' => ['name', 'phone', 'adress', 'price', 'short'],
        'textarea' => ['content', 'keywords', 'goods_content']
    ];

    static public function get ($property){ // методу подаем свойство которое хоти получить
        return self::instanse()->$property; // мы возвращаем ссылку на обьект
    }

    static public function instance(){ // публичный статический метод который будет создавать объект данного класса. Если в свойстве instance хранится обьект класса, то его вернуть. Если нет то создать обьект класса, записать его в свойство instance и после этого вернуть свойство instance
        if(self::$_instanse instanceof self){ // если в свойстве instance хранится обьект нашего класса то есть самого себя то
            return self::$_instanse; // возвращаем
        }// в противном случаем вернем
        return self::$_instanse = new self; // предварительно создаем обьект нашего класса и возвращаем
    } // все шаблон Single Ton мы реализовали.

    private function __construct() // закрыть контруктор класса
    {
    }

    private function __clone() //закрыть метод создания копии класса
    {
    }

}
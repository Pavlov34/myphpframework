<?php

namespace core\base\settings; // пространство имен

class Settings // создаем класс
{
    static private $_instance; //

    private $routes = [ // приватное свойство
        'admin' => [ // вход в админку
            'name' => 'admin', // подмена имени в адресной строке защита от брута
            'path' => 'core/admin/controller/', // путь к файлам админ панели
            'hrUrl' => false // для работы без ЧПУ в админ панели
        ],
        'settings' => [ // настройки сайта
            'path' => 'core/base/settings/' // путь настроек сайта
        ],
        'plugins' => [ // Плагины
            'path' => 'core/plugins/', // указываем где храми плагины
            'hrUrl' => false // не используем ЧПУ в адресной строке
        ],
        'user' => [ //  порльзовательская асть сайта
            'path' => 'core/user/controller', // путь настроек для пользователя
            'hrUrl' => true, // Для отображения ЧПУ для посетителей сайта
            'routes' => [ // пока оставили пустым

            ]
        ],
        'default' => [ // раздел по усолчанию
            'controller' => 'IndexController', // контроллер по умолчанию если не пришло значение в адресной строке
            'inputMethod' => 'inputData', // Метод по умолчанию у этого контроллера
            'outputMethod' => 'outputData' // Метод который отдает даннные в пользовательский шаблон
        ]
    ];

        private $templateArr = [
            'text' => ['name', 'phone', 'adress'],
            'textarea' => ['content', 'keywords']
        ];

        private function __construct() // закрыть контруктор класса
        {
        }

        private function __clone() //закрыть метод создания копии класса
        {
        }

        static public function get ($property){ // методу подаем свойство которое хоти получить
            return self::instanse()->$property; // мы возвращаем ссылку на обьект
        }

        static public function instance(){ // публичный статический метод который будет создавать объект данного класса. Если в свойстве instance хранится обьект класса, то его вернуть. Если нет то создать обьект класса, записать его в свойство instance и после этого вернуть свойство instance
            if(self::$_instanse instanceof self){ // если в свойстве instance хранится обьект нашего класса то есть самого себя то
                return self::$_instanse; // возвращаем
            }
            // в противном случаем вернем
            return self::$_instanse = new self; // предварительно создаем обьект нашего класса и возвращаем
        } // все шаблон Single Ton мы реализовали.

    public function clueProperties($class) {
            $baseProperties = [];

            foreach ($this as $name => $item){
                $property = $class::get($name);

                if(is_array($property) && is_array($item)) {
                    $baseProperties[$name] = $this->arrayMergeRecursive($this->$name, $property) // рукурсивная функция для обработки массивов
                    continue;
                }

                if(!$property) $baseProperties[$name] = $this->$name;
            }

            return $baseProperties;
    }

    /**
     * @return mixed
     */
    public function arrayMergeRecursive(){

        $arrays = func_get_args();

        $base = array_shift($arrays);

        foreach($arrays as $array){
            foreach($arrays as $key => $value){
                if(is_array($value) && is_array($base[$key])){
                    $base[$key] = $this->arrayMergeRecursive($base[$key], $value);
                }else{
                    if(is_int($key)){
                        if(!in_array($value, $base)) array_push($base, $value);
                        continue;
                    }
                    $base[$key] = $value;
                }
            }
        }
    }

}
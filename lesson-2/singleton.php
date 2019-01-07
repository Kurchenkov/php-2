<?
    trait myTrait{  
        // метод для удаления записи из таблицы по id
        public function deleteFromTable($id){
            echo 'method deleteFromTable was called !';
        }
    }

    class Singleton{
        private static $object = null;
        private function __construct(){}
        public static function getObject(){
            if(self::$object === null){
                self::$object = new Singleton;
            }
            return self::$object;
        }
        use myTrait;
    }

    $obj = Singleton::getObject();
    $obj->deleteFromTable(1);
?>

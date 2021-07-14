<?php

    class accesoDatos
    {
        private static $objAcceso;
        private $objetoPDO;
        private function __construct(){
        try{  
             //$this->objetoPDO = new PDO('mysql:host=localhost:3306;dbname=mitienda;charset=utf8','root','',array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->objetoPDO = new PDO('mysql:host=remotemysql.com:3306;dbname=zFQadKUnRd;charset=utf8','zFQadKUnRd','Sq9i9kyGES',array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
        }catch(PDOException $e){
                print "ERROR: en bd".$e->getMessage();
                die();
            }
        }

        public static function obtenerInstancia()
        {
            if (!isset(self::$objAcceso)) {
                self::$objAcceso = new accesoDatos();
            }
            return self::$objAcceso;
        }
    
        public function prepararConsulta($sql)
        {
            return $this->objetoPDO->prepare($sql);
        }

        public function obtenerUltimoId()
         {
        return $this->objetoPDO->lastInsertId();
        }
    }

?>
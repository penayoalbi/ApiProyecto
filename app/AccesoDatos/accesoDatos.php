<?php

    class accesoDatos
    {
        private static $objAcceso;
        private $objetoPDO;
        private function __construct(){
          try{  
          //  $this->objetoPDO = mysqli_connect("localhost","root","cr7carplove2911.","mitienda");
            $this->objetoPDO = new PDO("mysql:host=localhost:3306;password=cr7carplove2911.;dbname=mitienda"); 
            $this->objetoPDO = exec('SET CHARACTER SET utf8'); 
          
            return $objetoPDO;
            }catch(PDOException $e){
                 print "ERROR:".$e->getMessage();
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
<?php
echo"acceso a datos";

    class accesoDatos
    {
        private static $objAcceso;
        private $objetoPDO;
        private function __construct(){
          try{
              
             //$this->objetoPDO = new PDO("mysql:host=localhost","mitienda","root","cr7carplove2911.");
               $this->objetoPDO = new PDO('mysql:host=localhost;dbname=mitienda;user=root;password=cr7carplove2911.'); 
               $this->objetoPDO = exec("SET CHARACTER SET utf8"); 
               
                
            }catch(PDOException $e){
                 print "ERROR".$e->getMessage();
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
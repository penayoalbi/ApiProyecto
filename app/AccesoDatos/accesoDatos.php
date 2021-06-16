<?php
    class accesoDatos{
        private static $objAcceso;
        private $objetoPDO;
        $database="mitienda";
        $user='root';
	    $password='cr7carplove2911.';

        private function __construct(){
            try{
                $this->objetoPDO = new PDO('mysql:host=127.0.0.1;dbname= '.$database,$user,$password);
                echo "Se conecto a la base de datos";
            }catch(PDOException $e){
                echo"ERROR".$e->getMessage();
                die();
            }
        }

        public static function obtenerInstancia()
        {
            if (!isset(self::$objAccesoDatos)) {
                self::$objAccesoDatos = new accesoDatos();
            }
            return self::$objAccesoDatos;
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
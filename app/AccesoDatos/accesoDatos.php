<?php
    class accesoDatos{
        private static $objAcceso;
        private $objetoPDO;

        private function __construct(){
        $database='mitienda';
        $user='root';
	    $password='cr7carplove2911.';
            try{
                $this->objetoPDO = new PDO('mysql:host=127.0.0.1;dbname=charset=utf8'.$database,$user,$password);
                $this->objetoPDO = exec("SET CHARACTER SET utf8"); 
                echo "Se conecto a la base de datos";
            }catch(PDOException $e){
                echo"ERROR".$e->getMessage();
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
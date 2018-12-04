<?php
    class Encuesta
    {
        public $id;
        public $idMesa;
        public $restaurant;
        public $mozo;
        public $cocinero;
        public $reseña;
    
        public static function TraerEncuesta($id){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from encuesta WHERE id= :id ");  
            $consulta->bindValue(':id', $id, PDO::PARAM_STR);
            $consulta->execute();
            $encuesta= $consulta->fetchObject('Encuesta');
                    
            return $encuesta;
        }

        public function TraerEncuestas($request, $response, $args) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM encuesta");
            $consulta->execute();		
            	
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Encuesta");	
        }
        public function AltaEncuesta($idMesa) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            var_dump($idMesa);
            $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO encuesta (mesa) values (:idMesa) ");
            $consulta->bindValue(':idMesa', $idMesa, PDO::PARAM_INT);
            $consulta->execute();		
            	
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Encuesta");	
        }
        
    }
?>
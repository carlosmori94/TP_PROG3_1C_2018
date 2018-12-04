<?php
    class Mesa
    {
        public $id;
        public $estado;
        public $fotoUrl;
        
        public static function TraerMesa($id){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from mesas WHERE id= :id ");  
            $consulta->bindValue(':id', $id, PDO::PARAM_STR);
            $consulta->execute();
            $mesa= $consulta->fetchObject('Mesa');
                    
            return $mesa;
        }

        public function TraerMesas($request, $response, $args) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM mesas");
            $consulta->execute();		
            	
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Mesa");	
        }

    }
?>
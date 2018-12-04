<?php
    class Cliente
    {
        public $id;
        public $idMesa;
        public $idEncuesta;
        public $nombre;
    
        public static function TraerCliente($id){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from cliente WHERE id= :id ");  
            $consulta->bindValue(':id', $id, PDO::PARAM_STR);
            $consulta->execute();
            $cliente= $consulta->fetchObject('Cliente');
                    
            return $cliente;
        }

        public function TraerClientes($request, $response, $args) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM cliente");
            $consulta->execute();		

            return $consulta->fetchAll(PDO::FETCH_CLASS, "Cliente");	
        }
    }
?>
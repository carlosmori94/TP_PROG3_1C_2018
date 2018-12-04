<?php
    class Pedido
    {
        public $id;
        public $estado;
        public $idProducto;
        public $idCliente;
        public $idMesa;

        public static function TraerPedido($id){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from pedido WHERE id= :id ");  
            $consulta->bindValue(':id', $id, PDO::PARAM_STR);
            $consulta->execute();
            $mesa= $consulta->fetchObject('Pedido');
                    
            return $mesa;
        }

        public function TraerPedidos($request, $response, $args) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM pedido");
            $consulta->execute();		
            	
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Pedido");	
        }
    }
?>
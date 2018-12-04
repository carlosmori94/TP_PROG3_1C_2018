<?php
    class Factura
    {
        public $id;
        public $idMesa;
        public $importe;
        public $fecha;
        
        
        public static function TraerFactura($id){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from factura WHERE id= :id ");  
            $consulta->bindValue(':id', $id, PDO::PARAM_STR);
            $consulta->execute();
            $factura= $consulta->fetchObject('Factura');
                    
            return $factura;
        }

        public function TraerFacturas($request, $response, $args) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM factura");
            $consulta->execute();		
            	
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Factura");	
        }
    }
?>
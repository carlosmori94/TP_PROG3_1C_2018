<?php

class Producto
{
    public $id;
    public $nombre;

    public static function TraerProducto($id){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from producto WHERE id= :id ");  
        $consulta->bindValue(':id', $id, PDO::PARAM_STR);
        $consulta->execute();
        $mesa= $consulta->fetchObject('Producto');
                
        return $mesa;
    }

    public function TraerProductos($request, $response, $args) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM producto");
        $consulta->execute();		
            
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");	
    }
}

?>
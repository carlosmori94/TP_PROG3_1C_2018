<?php

class Producto
{
    public $id;
    public $nombre;


public static function TraerProducto($id) 
{
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from test WHERE id= :id ");  
    $consulta->bindValue(':id', $id, PDO::PARAM_STR);
	$consulta->execute();
	$producto= $consulta->fetchObject('Producto');
            
    return $producto;
									
}


}

?>
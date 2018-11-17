<?php
include_once "Producto.php";

class ProductoApi{

    
    public function TraerProducto($request, $response, $args) {
        $id= $args['id'];
        $producto = new Producto();
       $producto= Producto::TraerProducto($id);
       $newresponse = $response->withJson($producto, 200);  
      return $newresponse;
    }
}
?>
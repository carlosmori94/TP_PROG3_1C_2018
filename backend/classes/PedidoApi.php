<?php
include_once "Pedido.php";

class PedidoApi{
    
    public function TraerPedido($request, $response, $args) {
        $id= $args['id'];
        $pedido = new Pedido();
        $pedido= Pedido::TraerPedido($id);
        $newresponse = $response->withJson($pedido, 200);

        return $newresponse;
    }
    public function TraerPedidos($request, $response, $args) {
        $pedidos = new Pedido();
        $pedidos= Pedido::TraerPedidos();
        $newresponse = $response->withJson($pedidos, 200);  
        
        return $newresponse;
    }
}
?>
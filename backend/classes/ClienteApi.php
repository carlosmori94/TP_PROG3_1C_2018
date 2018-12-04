<?php
include_once "Cliente.php";

class ClienteApi{

    public function TraerCliente($request, $response, $args) {
        $id= $args['id'];
        $cliente = new Cliente();
        $cliente= Cliente::TraerCliente($id);
        $newresponse = $response->withJson($cliente, 200);

        return $newresponse;
    }
    public function TraerClientes($request, $response, $args) {
        $clientes = new Cliente();
        $clientes = Cliente::TraerClientes();
        $newresponse = $response->withJson($clientes, 200);  
        
        return $newresponse;
    }

}
?>
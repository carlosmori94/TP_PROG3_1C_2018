<?php
include_once "Usuario.php";

class MesaApi{

    public function TraerMesa($request, $response, $args) {
        $id= $args['id'];
        $mesa = new Mesa();
        $mesa= Mesa::TraerMesa($id);
        $newresponse = $response->withJson($mesa, 200);

        return $newresponse;
    }
    public function TraerMesas($request, $response, $args) {
        $mesas = new Mesa();
        $mesas= Mesa::TraerMesas();
        $newresponse = $response->withJson($mesas, 200);  
        
        return $newresponse;
    }

}
?>
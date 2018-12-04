<?php
include_once "Factura.php";

class FacturaApi{
    
    public function TraerFactura($request, $response, $args) {
        $id= $args['id'];
        $factura = new Factura();
        $factura= Factura::TraerFactura($id);
        $newresponse = $response->withJson($factura, 200);

        return $newresponse;
    }
    public function TraerFacturas($request, $response, $args) {
        $facturas = new Factura();
        $facturas= Factura::TraerFacturas();
        $newresponse = $response->withJson($facturas, 200);  
        
        return $newresponse;
    }
}
?>
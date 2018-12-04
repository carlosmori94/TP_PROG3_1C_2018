<?php
include_once "Usuario.php";

class UsuarioApi{
    
    public function TraerUsuario($request, $response, $args) {
        $id= $args['id'];
        $pedido = new Usuario();
        $pedido= Usuario::TraerUsuario($id);
        $newresponse = $response->withJson($pedido, 200);

        return $newresponse;
    }

    public function TraerUsuarios($request, $response, $args) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
    }

    public function Login($request, $response, $args) {
        $respuesta=new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $email= $ArrayDeParametros['email'];
        $password= $ArrayDeParametros['password'];
        $usuario= Usuario::Login($email, $password);
        $newresponse = $response->withJson($usuario, 200);  

      return $newresponse;
    }


}
?>
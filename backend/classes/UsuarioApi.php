<?php
include_once "Usuario.php";

class UsuarioApi{
    
    public function TraerTodos($request, $response, $args) {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
    }

    public function TraerUno($request, $response, $args) {
        $id= $args['id'];
        $usuario = new Usuario();
       $usuario= Usuario::TraerUno($id);
       $newresponse = $response->withJson($usuario, 200);  
      return $newresponse;
    }
}
?>
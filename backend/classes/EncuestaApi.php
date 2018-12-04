<?php
include_once "Encuesta.php";

class EncuestaApi{

    public function TraerEncuesta($request, $response, $args) {
        $id= $args['id'];
        $encuesta = new Encuesta();
        $encuesta= Encuesta::TraerEncuesta($id);
        $newresponse = $response->withJson($encuesta, 200);

        return $newresponse;
    }
    public function TraerEncuestas($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();

        $encuestas = new Encuesta();
        $encuestas= Encuesta::AltaEncuesta($idMesa);
        $newresponse = $response->withJson($encuestas, 200);  
        
        return $newresponse;
    }
    public static function Login($email , $password){

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        /*INSERT INTO `encuesta`(`id`, `mesa`, `restaurant`, `mozo`, `cocinero`, `reseña`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])*/
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO encuesta(`mesa`)values(:idMesa, :idEncuesta, :nombre)");
        $consulta->bindValue(':email', $email, PDO::PARAM_STR);
        $consulta->bindValue(':password', $password, PDO::PARAM_STR);
        $consulta->execute();
        $usuario= $consulta->fetchObject('Usuario');
                
        return $usuario;
    }

    public function Alta($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $idMesa= $ArrayDeParametros['idMesa'];
        $encuesta = new Encuesta();
        $encuesta= Encuesta::AltaEncuesta($idMesa);
        $newresponse = $response->withJson($encuesta, 200);  

      return $newresponse;
    }
}
?>
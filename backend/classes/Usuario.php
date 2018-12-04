<?php
    class Usuario
    {
        public $id;
        public $email;
        public $password;
        public $userType;
        
        public static function Login($email , $password){

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from usuarios WHERE email= :email and password= :password");  
            $consulta->bindValue(':email', $email, PDO::PARAM_STR);
            $consulta->bindValue(':password', $password, PDO::PARAM_STR);
            $consulta->execute();
            $usuario= $consulta->fetchObject('Usuario');
                    
            return $usuario;
        }
        public function TraerUsuarios($request, $response, $args) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");
            $consulta->execute();		
                
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
        }
    }
?>
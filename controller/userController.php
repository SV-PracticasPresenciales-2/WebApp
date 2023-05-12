<?php
require_once '../model/user.php';

class userController{

    private Sesion $sesion;

    public function __construsct(){
        $this->sesion = new Sesion();
    }

    /**
     * function
     * registrar_usuario($usuario, $password)
     * Registra un usuario en la BD.
     * Devuelve Boolean o String en caso de error
     *
     * userController.php
     *
     * @param Object $user
     * @param String $username
     * @param String $biography
     * @param String $name
     * @param String $password
     * @param int $phone_number
     * @param Date $register_date
     * @return Boolean
     */
    public function registerUser($nombre_usuario, $contrasenia, $nombre, $apellidos, $email){
        return usuario::registraUsuario($nombre_usuario, $contrasenia, $nombre, $apellidos, $email);
    }

    /**
     * function
     * login($usuario, $password)
     * Consigue un usuario de la BD.
     * Devuelve objeto usuario o String en caso de error
     *
     * userController.php
     *
     * @param Object $usuario
     * @param String $nombre_usuario
     * @param String $contrasenia
     * @return Boolean
     */
    public function login($nombre_usuario, $contrasenia){
        return usuario::consigueUsuario($nombre_usuario, $contrasenia);
    }

    public function consigueNombre($idUsuario){
        return usuario::consigueNombre($idUsuario);
    }

    public function cerrarSesion(){
        $this->sesion->borrarSesion();
    }
}

$campo = null;
$validacion = true;
$controlador = new usuarioController();
if (isset($_GET["cerrarSesion"])) {
    $controlador->cerrarSesion();
}
if (!isset($_GET["postId"])) {
    require_once("formularioUsuario/loginUsuario.php");
    require_once("formularioUsuario/registrarUsuario.php");
}

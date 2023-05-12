<?php
require_once '../model/users.php';

class userController{

    private Sesion $sesion;

    public function __construct(){
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
     * @param Object $user
     * @param String $username
     * @param String $password
     * @return Boolean
     */
    public function login($username, $password){
        return user::getUsuario($username, $password);
    }



    public function getName($id){
        return user::getName($id);
    }

    public function closeSesion(){
        $this->sesion->deleteSesion();
    }
}

$campo = null;
$validacion = true;
$controlador = new userController();
if (isset($_GET["closeSesion"])) {
    $controlador->closeSesion();
}






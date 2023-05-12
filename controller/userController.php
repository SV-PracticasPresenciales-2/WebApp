<?php
require_once '../model/users.php';

class userController{

    private users $user;

    public function __construct(){
       $this->user = new users(0, false, "", "", "", 0, "", "");
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

    /*public function getName($id){
        return user::getName($id);
    }
    */

    public function getUserDetails($id){
        return $this->user->getUserDetails($id);
    }
}

$controller = new userController();
if (isset($_GET["id"])) {
    $user = $controller->getUserDetails($_GET["id"]);
}






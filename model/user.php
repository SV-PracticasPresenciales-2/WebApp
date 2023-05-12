<?php

require_once '../model/conexion/conexion.php';
require_once 'sesion.php';

class user
{
    private int $id;
    private bool $active;
    private string $biography;
    private string $name;
    private string $password;
    private int $phone_number;

    private Date $register_date;

    private string $username;

    private Sesion $sesion;

    /**
     * @param int $id
     * @param bool $active
     * @param string $biography
     * @param string $name
     * @param string $password
     * @param int $phone_number
     * @param Date $register_date
     * @param string $username

     */
    public function __construct(int $id, bool $active, string $biography, string $name, string $password, int $phone_number, Date $register_date, string $username)
    {
        $this->id = $id;
        $this->active = $active;
        $this->biography = $biography;
        $this->name = $name;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->register_date = $register_date;
        $this->username = $username;

    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->username;
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->id;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
  //  public function getRol(): string
   // {
  //      return $this->rol;
  //  }
//
  //  /**
  //   * @param string $rol
// /*    */
 //   public function setRol(string $rol): void
 //   {
  //      $this->rol = $rol;
 //    }

 //   /**
 //    * @return string
//     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): int
    {
        return $this->phone_number;
    }

    /**
     * @param int $phone_number
     */
    public function setPhoneNumber(int $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    public function getRegisterDate(): Date
    {
        return $this->register_date;
    }

    /**
     * @param Date $register_date
     */
    public function setRegisterDate(Date $register_date): void
    {
        $this->register_date = $register_date;
    }
    public static function getUser($username, $password)
    {
        try {
            $password = self::cryptconmd5($password);
            $conexion = Conectar::Conexion();

            if (gettype($conexion) == "string") {
                return $conexion;
            }

            $sql = "SELECT * FROM USERS WHERE username = :user AND password = :password";
            //$respuesta = $conexion->prepare("SELECT * FROM usuarios where nombre_usuario = '.$nombre_usuario' and contrasenia = '$contrasenia'");
            $respuesta = $conexion->prepare($sql);
            $respuesta->execute(array(':user' => $username, ':password' => $password));
            $respuesta = $respuesta->fetch(PDO::FETCH_ASSOC);

            $conexion = null;

            if ($respuesta) {
                $user = new user($respuesta["id"], $respuesta["biography"], $respuesta["name"], $respuesta["password"],
                    $respuesta["phone_number"], $respuesta["register_date"], $respuesta["username"]);
                Sesion::creaSesion("user", $user->getUserName());
                return $user;

            } else {
                return $user = null;
            }
        } catch (PDOException $e) {
            return Conectar::mensajes($e->getCode());
        }
    }

    public static function registerUser($username, $password,$biography, $name, $phone_number, $register_date)
    {
        try {
            $password = self::cryptconmd5($password);
            $conexion = Conectar::Conexion();

            if (gettype($conexion) == "string") {
                return $conexion;
            }

            $sql = "INSERT INTO USERS (username, password, biography, name, phone_number, register_date) VALUES (username, password, biography, name, phone_number, register_date)";
            $respuesta = $conexion->prepare($sql);
            $respuesta = $respuesta->execute(array(":username" => $username, ":password" => $password, ":biography" => $biography, ":name" => $name, ":phone_number" => $phone_number, ":register_date" => $register_date));

            $conexion = null;
            return $respuesta;
        } catch (PDOException $e) {
            return Conectar::mensajes($e->getCode());
        }
    }

    public static function getName($id){
        try {
            $conexion = Conectar::Conexion();

            if (gettype($conexion) == "string") {
                return $conexion;
            }

            $sql = "SELECT username FROM USERS WHERE id = :user";

            //$respuesta = $conexion->prepare("SELECT * FROM usuarios where nombre_usuario = '.$nombre_usuario' and contrasenia = '$contrasenia'");
            $respuesta = $conexion->prepare($sql);
            $respuesta->execute(array(':user' => $id));
            $respuesta = $respuesta->fetch(PDO::FETCH_ASSOC);

            $conexion = null;

            if ($respuesta) {
                return $respuesta;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return Conectar::mensajes($e->getCode());
        }
    }

    public static function cryptconmd5($password)
    {
        //Crea un salt
        $salt = md5($password . "%*4!#$;.k~’(_@");
        $password = md5($salt . $password . $salt);
        return $password;
    }

}

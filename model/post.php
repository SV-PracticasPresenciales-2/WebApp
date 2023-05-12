<?php
include_once 'conexion/conexion.php';


class post
{
    private int $id;
    private int $likes;
    private string $message;
    private string $post_date;
    private string $post_user;

    /**
     * @param int $id
     * @param int $likes
     * @param string $message
     * @param string $post_date
     * @param string $post_user
     */
    public function __construct(int $id, int $likes, string $message, string $post_date, string $post_user)
    {
        $this->id = $id;
        $this->likes = $likes;
        $this->message = $message;
        $this->post_date = $post_date;
        $this->post_user = $post_user;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     * @param int $likes
     */
    public function setLikes(int $likes): void
    {
        $this->likes = $likes;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return DateTime
     */
    public function getPostDate(): DateTime
    {
        return $this->post_date;
    }

    /**
     * @param DateTime $post_date
     */
    public function setPostDate(DateTime $post_date): void
    {
        $this->post_date = $post_date;
    }

    /**
     * @return string
     */
    public function getPostUser(): string
    {
        return $this->post_user;
    }

    /**
     * @param string $post_user
     */
    public function setPostUser(string $post_user): void
    {
        $this->post_user = $post_user;
    }


      function messages()
    {
        try {
            $conexion = Conectar::Conexion();

            if (gettype($conexion) == "string") {
                //  return $conexion;
            }
            $sql = "Select * from posts";
            $res = $conexion->prepare($sql);
            $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);


        } catch (PDOException $e) {
            return Conectar::mensajes($e->getCode());
        }
    }
}


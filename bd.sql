

CREATE TABLE USUARIOS (

    userId int(10) NOT NULL auto_increment PRIMARY KEY,
nombre_usuario varchar(50)  NULL UNIQUE,
contrasenia varchar(225) NOT NULL,
rol varchar(50) NOT NULL,
nombre varchar(50) NOT NULL,
apellidos varchar(50) NOT NULL,
email varchar(100) NOT NULL

) ;

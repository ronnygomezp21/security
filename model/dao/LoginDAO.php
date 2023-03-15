<?php
// autor: Zuñiga Kayler

require_once 'config/conexion.php';

class LoginDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function login($correo, $password)
    {
        $sql = "select * from usuario inner join rol on usuario.id_rol = rol.id_rol where correo=:correo and password=:password";
        $sentencia = $this->con->prepare($sql);
        $data = [
            'correo' => $correo,
            'password' => $password,
        ];
        $sentencia->execute($data);
        $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function insert($usuario)
    {

        try {

            $sql = "insert into usuario (cedula, nombres, apellidos, correo, password, id_rol) VALUES
            (:cedula, :nombres, :apellidos, :correo, :password, :id_rol)";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'cedula' => $usuario->getCedula(),
                'nombres' => $usuario->getNombres(),
                'apellidos' => $usuario->getApellidos(),
                'correo' => $usuario->getCorreo(),
                'password' => $usuario->getPassword(),
                'id_rol' => $usuario->getId_rol(),
            ];

            $sentencia->execute($data);

            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }
}

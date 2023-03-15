<?php

// autor: Zuñiga Kayler

require_once 'config/conexion.php';

class UsuarioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        $sql = "select * from usuario u  inner join rol r on u.id_rol = r.id_rol where (u.cedula like :cedula or u.apellidos like :apellidos) and u.estado = 1";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('cedula' => $conlike, 'apellidos' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function insert($usuario)
    {
        try {

            $sql = "insert into usuario (cedula, nombres, apellidos, correo, password, id_rol, usuario_creacion) VALUES
            (:cedula, :nombres, :apellidos, :correo, :password, :id_rol, :usuario_creacion)";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'cedula' => $usuario->getCedula(),
                'nombres' => $usuario->getNombres(),
                'apellidos' => $usuario->getApellidos(),
                'correo' => $usuario->getCorreo(),
                'password' => $usuario->getPassword(),
                'id_rol' => $usuario->getId_rol(),
                'usuario_creacion' => $usuario->getUsuarioCreacion(),
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

    public function selectOne($id)
    {
        $sql = "select * from usuario where " .
            "id_usuario=:id_usuario";
        $stmt = $this->con->prepare($sql);
        $data = ['id_usuario' => $id];
        $stmt->execute($data);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    public function update($usuario)
    {
        try {

            $sql = "update usuario set cedula=:cedula, nombres=:nombres, apellidos=:apellidos, correo=:correo,
                    password=:password, id_rol=:id_rol  where id_usuario=:id_usuario";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'cedula' => $usuario->getCedula(),
                'nombres' => $usuario->getNombres(),
                'apellidos' => $usuario->getApellidos(),
                'correo' => $usuario->getCorreo(),
                'password' => $usuario->getPassword(),
                'id_rol' => $usuario->getId_rol(),
                'id_usuario' => $usuario->getId(),
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

    public function delete($usuario)
    {
        try {

            $sql = "update usuario set estado=0 where id_usuario=:id_usuario";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'id_usuario' => $usuario->getId(),
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

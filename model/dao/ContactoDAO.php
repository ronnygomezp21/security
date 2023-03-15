<?php

// autor: Quijije Piza Antony José

require_once 'config/conexion.php';

class ContactoDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        $sql = "select * from contactanos where (correo like :correo or cedula_pasaporte like :cedula_pasaporte) and estado = 1";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('correo' => $conlike, 'cedula_pasaporte' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function insert($contacto)
    {

        try {

            $sql = "insert into contactanos (nombres, apellidos, cedula_pasaporte, fecha_nacimiento, estado_civil, correo, telefono)
                    values (:nombres, :apellidos, :cedula_pasaporte, :fecha_nacimiento, :estado_civil, :correo, :telefono)";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombres' => $contacto->getNombres(),
                'apellidos' => $contacto->getApellidos(),
                'cedula_pasaporte' => $contacto->getCedula_pasaporte(),
                'fecha_nacimiento' => $contacto->getFecha_nacimiento(),
                'estado_civil' => $contacto->getEstado_civil(),
                'correo' => $contacto->getCorreo(),
                'telefono' => $contacto->getTelefono(),
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
        $sql = "select * from contactanos where id_contactanos=:id_contactanos";

        $stmt = $this->con->prepare($sql);

        $data = ['id_contactanos' => $id];
        $stmt->execute($data);
        $contacto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $contacto;
    }

    public function update($contacto)
    {
        try {

            $sql = "update contactanos set descripcion=:descripcion, id_usuario=:id_usuario where id_contactanos=:id_contactanos";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'descripcion' => $contacto->getDescripcion(),
                'id_usuario' => $contacto->getId_usuario(),
                'id_contactanos' => $contacto->getId_contactanos(),
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

    public function delete($contacto)
    {
        try {

            $sql = "update contactanos set estado=0 where id_contactanos=:id_contactanos";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'id_contactanos' => $contacto->getId_contactanos(),
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

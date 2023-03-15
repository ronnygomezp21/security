<?php

// autor: Piguave Cristhian

require_once 'config/conexion.php';

class ServicioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        $sql = "select * from servicio where (nombres_usuario like :nombres or apellidos_usuario like :apellidos or estado_servicio like :estado_servicio) and estado = 1";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('nombres' => $conlike, 'apellidos' => $conlike, 'estado_servicio' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function insert($servicio)
    {

        try {

            $sql = "insert into servicio (nombres_usuario, apellidos_usuario, telefono_usuario, correo_usuario, tipo_servicio) values
            (:nombres, :apellidos, :telefono, :correo, :tipo)";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombres' => $servicio->getNombres_usuario(),
                'apellidos' => $servicio->getApellidos_usuario(),
                'telefono' => $servicio->getTelefono_usuario(),
                'correo' => $servicio->getCorreo_usuario(),
                'tipo' => $servicio->getTipo_servicio(),
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

    public function delete($servicio)
    {
        try {

            $sql = "update servicio set estado=0 where id_servicio=:id_servicio";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'id_servicio' => $servicio->getId(),
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
        $sql = "select * from servicio where " .
            "id_servicio=:id_servicio";
        $stmt = $this->con->prepare($sql);
        $data = ['id_servicio' => $id];
        $stmt->execute($data);
        $servicio = $stmt->fetch(PDO::FETCH_ASSOC);
        return $servicio;
    }

    public function update($servicio)
    {
        try {

            $sql = "update servicio set descripcion=:descripcion, estado_servicio=:estado_servicio where id_servicio=:id_servicio";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'descripcion' => $servicio->getDescripcion(),
                'estado_servicio' => $servicio->getEstado_servicio(),
                'id_servicio' => $servicio->getId(),
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

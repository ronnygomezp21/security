<?php
// autor: Zuñiga Kayler

require_once 'config/conexion.php';

class RolDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function listar()
    {
        $sql = "select * from rol";
        $sentencia = $this->con->prepare($sql);
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }
}
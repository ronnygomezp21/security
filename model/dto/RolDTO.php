<?php

// autor: Zuñiga Kayler

class RolDTO
{

    private $id_rol, $nombre_rol, $descripcion;

    public function __construct()
    {

    }

    public function getId_rol()
    {
        return $this->id_rol;
    }

    public function getNombre_rol()
    {
        return $this->nombre_rol;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    public function setNombre_rol($nombre_rol)
    {
        $this->nombre_rol = $nombre_rol;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}

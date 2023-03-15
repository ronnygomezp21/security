<?php

// autor: Piguave Cristhian

class ServicioDTO
{

    private $id_servicio, $nombres_usuario, $apellidos_usuario, $telefono_usuario, $correo_usuario, $tipo_servicio, $fecha_creacion, $estado, $descripcion, $estado_servicio;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id_servicio;
    }

    public function getNombres_usuario()
    {
        return $this->nombres_usuario;
    }

    public function getApellidos_usuario()
    {
        return $this->apellidos_usuario;
    }

    public function getTelefono_usuario()
    {
        return $this->telefono_usuario;
    }

    public function getCorreo_usuario()
    {
        return $this->correo_usuario;
    }

    public function getTipo_servicio()
    {
        return $this->tipo_servicio;
    }

    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getEstado_servicio()
    {
        return $this->estado_servicio;
    }

    public function setId($id_servicio)
    {
        $this->id_servicio = $id_servicio;
    }

    public function setNombres_usuario($nombres_usuario)
    {
        $this->nombres_usuario = $nombres_usuario;
    }

    public function setApellidos_usuario($apellidos_usuario)
    {
        $this->apellidos_usuario = $apellidos_usuario;
    }

    public function setTelefono_usuario($telefono_usuario)
    {
        $this->telefono_usuario = $telefono_usuario;
    }

    public function setCorreo_usuario($correo_usuario)
    {
        $this->correo_usuario = $correo_usuario;
    }

    public function setTipo_servicio($tipo_servicio)
    {
        $this->tipo_servicio = $tipo_servicio;
    }

    public function setFecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setEstado_servicio($estado_servicio)
    {
        $this->estado_servicio = $estado_servicio;
    }
}

<?php

// autor: Quijije Piza Antony José

class ContactoDTO
{

    private $id_contactanos, $nombres, $apellidos, $cedula_pasaporte, $fecha_nacimiento, $estado_civil, $correo, $telefono, $descripcion, $estado, $id_usuario;

    public function __construct()
    {

    }

    public function getId_contactanos()
    {
        return $this->id_contactanos;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCedula_pasaporte()
    {
        return $this->cedula_pasaporte;
    }

    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function getEstado_civil()
    {
        return $this->estado_civil;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_contactanos($id_contactanos)
    {
        $this->id_contactanos = $id_contactanos;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setCedula_pasaporte($cedula_pasaporte)
    {
        $this->cedula_pasaporte = $cedula_pasaporte;
    }

    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function setEstado_civil($estado_civil)
    {
        $this->estado_civil = $estado_civil;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
}

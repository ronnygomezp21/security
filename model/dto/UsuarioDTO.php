<?php

// autor: Zuñiga Kayler

class UsuarioDTO
{

    private $id_usuario, $cedula, $nombres, $apellidos, $correo, $password, $id_rol, $usuarioCreacion, $estado;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id_usuario;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getId_rol()
    {
        return $this->id_rol;
    }

    public function getUsuarioCreacion()
    {
        return $this->usuarioCreacion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setId($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    public function setUsuarioCreacion($usuarioCreacion)
    {
        $this->usuarioCreacion = $usuarioCreacion;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}

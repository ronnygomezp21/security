
<?php
// dto data transfer object
class SedeDTO {
    //properties
    private $id, $provincia, $ciudad, $horario, $activo, $direccion,$fecha;
   
    function __construct() {
        
    }

   function getId() {
        return $this->id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getHorario() {
        return $this->horario;
    }

    function getActivo() {
        return $this->activo;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}

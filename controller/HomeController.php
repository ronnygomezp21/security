<?php

// autor: Zuñiga Kayler

class HomeController
{

    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        require_once VHOME . 'home.php';
    }

    public function servicios()
    {
        require_once VHOME . 'servicios.php';
    }

    public function nuestro_equipo()
    {
        require_once VHOME . 'nuestroEquipo.php';
    }

    public function seguridad_electronica()
    {
        require_once VHOME . 'seguridadElectronica.php';
    }

    public function preguntas_frecuentes()
    {
        require_once VHOME . 'preguntasFrecuentes.php';
    }

    public function contacto()
    {
        require_once VHOME . 'contacto.php';
    }
}

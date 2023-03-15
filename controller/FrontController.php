<?php

require_once 'config/config.php';
class FrontController
{
    public function ruteo()
    {
        // leer parametros
        $controlador = (!empty($_REQUEST['c'])) ? htmlentities($_REQUEST['c']) : CONTROLADOR_PRINCIPAL;
        // productos
        $controlador = ucwords(strtolower($controlador)) . "Controller";
        //ProductosController
        $funcion = (!empty($_REQUEST['f'])) ? htmlentities($_REQUEST['f']) : FUNCION_PRINCIPAL;

        require_once 'controller/' . $controlador . '.php';
        $cont = new $controlador();
        $cont->$funcion();
    }

}

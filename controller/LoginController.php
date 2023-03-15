<?php

// autor: Zuñiga Kayler

require_once 'model/dao/LoginDAO.php';
require_once 'model/dto/UsuarioDTO.php';

class LoginController
{
    private $model;

    public function __construct()
    {
        $this->model = new LoginDAO();
        session_start();
    }

    public function index()
    {
        if (!empty($_SESSION['nombres'])) {
            header('location: index.php?c=usuario&f=dashbord');
        } else {
            require_once VLOGIN . 'login.php';
        }
    }

    public function login()
    {

        if (!empty($_POST['correo']) && !empty($_POST['password'])) {

            $correo = filter_var(htmlentities($_POST['correo']), FILTER_SANITIZE_EMAIL);
            $password = htmlentities($_POST['password']);

            $resultado = $this->model->login($correo, $password);

            if ($resultado > 0) {
                $_SESSION['nombres'] = $resultado->nombres;
                $_SESSION['apellidos'] = $resultado->apellidos;
                $_SESSION['correo'] = $resultado->correo;
                $_SESSION['id_rol'] = $resultado->id_rol;
                $_SESSION['nombre_rol'] = $resultado->nombre_rol;
                $_SESSION['id_usuario'] = $resultado->id_usuario;

                if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
                    header('location: index.php?c=usuario&f=dashbord');
                } else {
                    header('location: index.php?c=home&f=index');
                }
            } else {

                $mensaje = "Usuario o contraseña incorrectos";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=login&f=index');
            }

        } else {

            $mensaje = "Por favor ingresa tus credenciales";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;

            header('Location:index.php?c=login&f=index');
        }

    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

    public function registro()
    {

        if (!empty($_SESSION['nombres'])) {
            header('location: index.php?c=usuario&f=dashbord');
        } else {
            require_once VLOGIN . 'registro.php';
        }

    }

    public function guardar()
    {
        if (!empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['cedula'])) {

            $usuario = new UsuarioDTO();
            $usuario->setNombres(filter_var(htmlentities($_POST['nombres']), FILTER_SANITIZE_STRING));
            $usuario->setApellidos(filter_var(htmlentities($_POST['apellidos']), FILTER_SANITIZE_STRING));
            $usuario->setCorreo(filter_var(htmlentities($_POST['correo']), FILTER_SANITIZE_EMAIL));
            $usuario->setPassword(htmlentities($_POST['password']));
            $usuario->setCedula(filter_var(htmlentities($_POST['cedula']), FILTER_SANITIZE_NUMBER_INT));
            $rol = 3;
            $usuario->setId_rol($rol);

            $resultado = $this->model->insert($usuario);

            if ($resultado > 0) {
                $mensaje = "Su registro se ha realizado con exito";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=login&f=index');

            } else {
                $mensaje = "No se pudo realizar el registro, intentalo de nuevo";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=login&f=registro');
            }

        } else {
            $mensaje = "Por favor completa todo los campos";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('Location:index.php?c=login&f=registro');
        }
    }
}

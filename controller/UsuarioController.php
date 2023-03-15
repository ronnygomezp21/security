<?php

// autor: Zuñiga Kayler
require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dao/RolDAO.php'; // <--- New line
require_once 'model/dto/UsuarioDTO.php';

class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuarioDAO();
        session_start();
        if (empty($_SESSION['nombres'])) {

            header('location: index.php?c=login&f=index');
        }
    }

    public function index()
    {
        if ($_SESSION['id_rol'] == 1) {
            $usuarios = $this->model->selectAll("");
            require_once VUSUARIOS . 'usuarios.list.php';
        } else if ($_SESSION['id_rol'] == 2) {
            $mensaje = "No tienes permisos para acceder a esta sección";
            $_SESSION['mensaje'] = $mensaje;
            header('location: index.php?c=usuario&f=dashbord');
        } else {
            header('location: index.php?c=usuario&f=dashbord');
        }
    }

    public function view_new()
    {
        if ($_SESSION['id_rol'] == 1) {

            $modeloRol = new RolDAO(); // <--- New line
            $roles = $modeloRol->listar(); // <--- New line
            require_once VUSUARIOS . 'usuarios.nuevo.php';
        } else if ($_SESSION['id_rol'] == 2) {
            $mensaje = "No tienes permisos para acceder a esta sección";
            $_SESSION['mensaje'] = $mensaje;
            header('location: index.php?c=usuario&f=dashbord');
        } else {
            header('location: index.php?c=usuario&f=dashbord');
        }

    }

    public function crear()
    {
        if (!empty($_POST['cedula']) && !empty($_POST['nombres'] && !empty($_POST['apellidos']) && !empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['rol']))) {

            $usuario = new UsuarioDTO();
            $usuario->setCedula(htmlentities($_POST['cedula']));
            $usuario->setNombres(htmlentities($_POST['nombres']));
            $usuario->setApellidos(htmlentities($_POST['apellidos']));
            $usuario->setCorreo(htmlentities($_POST['correo']));
            $usuario->setPassword(htmlentities($_POST['password']));
            $usuario->setId_rol(htmlentities($_POST['rol']));
            $usuario->setUsuarioCreacion($_SESSION['nombres'] . ' ' . $_SESSION['apellidos']);

            $resultado = $this->model->insert($usuario);

            if ($resultado > 0) {

                $mensaje = "Usuario creado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;

                header('location: index.php?c=usuario&f=index');
            } else {

                $mensaje = "Error al crear el usuario";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;

                header('location: index.php?c=usuario&f=index');
            }
        } else {

            $mensaje = "Por favor ingresa todos los campos";
            $_SESSION['mensaje'] = $mensaje;

            header('location: index.php?c=usuario&f=view_new');
        }
    }

    public function buscar()
    {
        $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";
        $resultados = $this->model->selectAll($parametro);
        echo json_encode($resultados);
    }

    public function view_edit()
    {
        if ($_SESSION['id_rol'] == 1) {
            if (!empty($_REQUEST['id'])) {
                $id = htmlentities($_REQUEST['id']);
                $usuario = $this->model->selectOne($id);

                if ($usuario == 0) {
                    $mensaje = "No se encontró el usuario";
                    $color = "danger";
                    $_SESSION['mensaje'] = $mensaje;
                    $_SESSION['color'] = $color;
                    header('location: index.php?c=usuario&f=index');
                    exit;
                }
            } else {
                $mensaje = "No se ha seleccionado un usuario para editar";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=usuario&f=index');
                exit;
            }
        } else {
            $mensaje = "No tienes permisos para acceder a esta sección";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('location: index.php?c=usuario&f=dashbord');
            exit;
        }

        $modeloRol = new RolDAO(); // <--- New line
        $roles = $modeloRol->listar(); // <--- New line
        require_once VUSUARIOS . 'usuarios.edit.php';
    }

    public function editar()
    {

        if (!empty($_POST['cedula']) && !empty($_POST['nombres'] && !empty($_POST['apellidos']) && !empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['rol']))) {
            $usuario = new UsuarioDTO();
            $usuario->setId(htmlentities($_POST['id']));
            $usuario->setCedula(htmlentities($_POST['cedula']));
            $usuario->setNombres(htmlentities($_POST['nombres']));
            $usuario->setApellidos(htmlentities($_POST['apellidos']));
            $usuario->setCorreo(htmlentities($_POST['correo']));
            $usuario->setPassword(htmlentities($_POST['password']));
            $usuario->setId_rol(htmlentities($_POST['rol']));

            $resultado = $this->model->update($usuario);

            if ($resultado > 0) {

                $mensaje = "Usuario editado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;

                header('location: index.php?c=usuario&f=index');
            } else {

                $mensaje = "Error al editar el usuario";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=usuario&f=index');
            }
        } else {

            $mensaje = "Por favor ingresa todos los campos";
            $_SESSION['mensaje'] = $mensaje;

            header('location: index.php?c=usuario&f=view_edit&id=' . $_POST['id']);
        }
    }

    public function eliminar()
    {
        if (!empty($_REQUEST['id'])) {

            $usuario = new UsuarioDTO();
            $usuario->setId(htmlentities($_REQUEST['id']));
            $resultado = $this->model->delete($usuario);

            if ($resultado > 0) {
                $mensaje = "Usuario eliminado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=usuario&f=index');
                exit;
            } else {
                $mensaje = "Error al eliminar el usuario";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=usuario&f=index');
                exit;
            }

        } else {
            $mensaje = "No se ha seleccionado un usuario para eliminar";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('location: index.php?c=usuario&f=index');
        }
    }

    public function dashbord()
    {
        if ($_SESSION['id_rol'] == 3) {
            header('location: index.php?c=home&f=index');
        } else {
            require_once VUSUARIOS . 'dashbord.php';
        }
    }
}

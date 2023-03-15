<?php

// autor: Quijije Piza Antony José

require_once 'model/dao/ContactoDAO.php';
require_once 'model/dto/ContactoDTO.php';

class ContactoController
{

    private $model;

    public function __construct()
    {
        $this->model = new ContactoDAO();
        session_start();
    }

    public function index()
    {
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {

            $contactanos = $this->model->selectAll("");
            require_once VCONTACTO . 'contactanos.list.php';

        } else {
            header('location: index.php?c=usuario&f=dashbord');
        }
    }

    public function view_new()
    {
        require_once VCONTACTO . 'contactanos.nuevo.php';
    }

    public function nuevo()
    {

        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['documenId']) && !empty($_POST['fechaNacimiento'] && !empty($_POST['estadoC']) && !empty($_POST['correo']) && !empty($_POST['telefono']))) {

            $contacto = new ContactoDTO();
            $contacto->setNombres(htmlentities($_POST['nombre']));
            $contacto->setApellidos(htmlentities($_POST['apellido']));
            $contacto->setCedula_pasaporte(htmlentities($_POST['documenId']));
            $contacto->setFecha_nacimiento(htmlentities($_POST['fechaNacimiento']));
            $contacto->setEstado_civil(htmlentities($_POST['estadoC']));
            $contacto->setCorreo(htmlentities($_POST['correo']));
            $contacto->setTelefono(htmlentities($_POST['telefono']));

            $resultado = $this->model->insert($contacto);

            if ($resultado > 0) {

                $mensaje = "El contacto se ha registrado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=view_new');

            } else {

                $mensaje = "Hubo un error al registrar el contacto, intentalo de nuevo";
                $color = "dander";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=view_new');
            }

        } else {

            $mensaje = "Por favor, completa todo los campos";
            $color = "dander";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('location: index.php?c=contacto&f=view_new');
        }
    }

    public function view_edit()
    {
        if ($_SESSION['id_rol'] == 1) {
            if (!empty($_REQUEST['id'])) {
                $id = htmlentities($_REQUEST['id']);
                $contacto = $this->model->selectOne($id);

                if ($contacto == 0) {
                    $mensaje = "No se encontró el contacto";
                    $color = "danger";
                    $_SESSION['mensaje'] = $mensaje;
                    $_SESSION['color'] = $color;
                    header('location: index.php?c=contacto&f=index');
                    exit;
                }
            } else {
                $mensaje = "No se ha seleccionado un contacto para editar";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=index');
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

        require_once VCONTACTO . 'contactanos.edit.php';
    }

    public function editar()
    {
        if (!empty($_POST['descripcion']) && !empty($_POST['id'])) {

            $contacto = new ContactoDTO();
            $contacto->setDescripcion(htmlentities($_POST['descripcion']));
            $contacto->setId_contactanos(htmlentities($_POST['id']));
            $contacto->setId_usuario(htmlentities($_SESSION['id_usuario']));

            $resultado = $this->model->update($contacto);

            if ($resultado > 0) {
                $mensaje = "El contacto se ha editado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=index');
            } else {
                $mensaje = "Hubo un error al editar el contacto, intentalo de nuevo";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=index');
            }

        } else {
            $mensaje = "Por favor, la descripción es obligatoria";
            $color = "dander";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('location: index.php?c=contacto&f=view_edit&id=' . $_POST['id']);
        }
    }

    public function eliminar()
    {
        if (!empty($_REQUEST['id'])) {

            $contacto = new ContactoDTO();
            $contacto->setId_contactanos(htmlentities($_REQUEST['id']));

            $resultado = $this->model->delete($contacto);

            if ($resultado > 0) {
                $mensaje = "Contacto eliminado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=index');
                exit;
            } else {
                $mensaje = "Error al eliminar el contacto";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=contacto&f=index');
                exit;
            }

        } else {
            $mensaje = "No se ha seleccionado un contacto para eliminar";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('location: index.php?c=contacto&f=index');
        }
    }

    public function buscar()
    {
        $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";
        $resultados = $this->model->selectAll($parametro);
        echo json_encode($resultados);
    }
}

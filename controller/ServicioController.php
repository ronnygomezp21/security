<?php

// autor: Piguave Cristhian
require_once 'model/dao/ServicioDAO.php';
require_once 'model/dto/ServicioDTO.php';

class ServicioController
{
    private $model;

    public function __construct()
    {
        $this->model = new ServicioDAO();
        session_start();
    }

    public function index()
    {
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {

            $servicios = $this->model->selectAll("");
            require_once VSERVICIOS . 'servicios.list.php';

        } else {
            header('location: index.php?c=usuario&f=dashbord');
        }
    }

    public function view_new()
    {
        if (isset($_SESSION['nombres'])) {
            require_once VSERVICIOS . 'servicios.nuevo.php';

        } else {
            $mensaje = "Debes iniciar sesion o registrarte para acceder a esta pagina";
            $color = "warning";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('Location:index.php?c=login&f=index');
        }
    }

    public function nuevo()
    {
        if (!empty($_POST['telefono']) && !empty($_POST['servicio'])) {

            $servicio = new ServicioDTO();
            $servicio->setNombres_usuario($_SESSION['nombres']);
            $servicio->setApellidos_usuario($_SESSION['apellidos']);
            $servicio->setTelefono_usuario(filter_var(htmlentities($_POST['telefono']), FILTER_SANITIZE_NUMBER_INT));
            $servicio->setCorreo_usuario($_SESSION['correo']);
            $servicio->setTipo_servicio(htmlentities($_POST['servicio']));

            $resultado = $this->model->insert($servicio);

            if ($resultado > 0) {

                $mensaje = "Servicio registrado con exito";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=servicio&f=view_new');

            } else {

                $mensaje = "Error al registrar el servicio";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('Location:index.php?c=servicio&f=view_new');
            }

        } else {
            $mensaje = "Debes llenar todos los campos";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('Location:index.php?c=servicio&f=view_new');
        }
    }

    public function buscar()
    {
        $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";
        $resultados = $this->model->selectAll($parametro);
        echo json_encode($resultados);
    }

    public function eliminar()
    {
        if (!empty($_REQUEST['id'])) {

            $servicio = new ServicioDTO();
            $servicio->setId(htmlentities($_REQUEST['id']));
            $resultado = $this->model->delete($servicio);

            if ($resultado > 0) {
                $mensaje = "Servicio eliminado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=servicio&f=index');
                exit;
            } else {
                $mensaje = "Error al eliminar el servicio";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=servicio&f=index');
                exit;
            }

        } else {
            $mensaje = "No se ha seleccionado un servicio para eliminar";
            $color = "danger";
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['color'] = $color;
            header('location: index.php?c=servicio&f=index');
        }
    }

    public function view_edit()
    {
        if ($_SESSION['id_rol'] == 1) {
            if (!empty($_REQUEST['id'])) {
                $id = htmlentities($_REQUEST['id']);
                $servicio = $this->model->selectOne($id);

                if ($servicio == 0) {
                    $mensaje = "No se encontró el servicio";
                    $color = "danger";
                    $_SESSION['mensaje'] = $mensaje;
                    $_SESSION['color'] = $color;
                    header('location: index.php?c=servicio&f=index');
                    exit;
                }
            } else {
                $mensaje = "No se ha seleccionado un servicio para editar";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=servicio&f=index');
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

        require_once VSERVICIOS . 'servicios.edit.php';
    }

    public function editar()
    {

        if (!empty($_POST['descripcion']) && !empty($_POST['estado_servicio'])) {
            $servicio = new ServicioDTO();
            $servicio->setId(htmlentities($_POST['id']));
            $servicio->setDescripcion(htmlentities($_POST['descripcion']));
            $servicio->setEstado_servicio(htmlentities($_POST['estado_servicio']));

            $resultado = $this->model->update($servicio);

            if ($resultado > 0) {

                $mensaje = "Servicio editado correctamente";
                $color = "success";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;

                header('location: index.php?c=servicio&f=index');
            } else {

                $mensaje = "Error al editar el servicio";
                $color = "danger";
                $_SESSION['mensaje'] = $mensaje;
                $_SESSION['color'] = $color;
                header('location: index.php?c=servicio&f=index');
            }
        } else {

            $mensaje = "Por favor ingresa todos los campos";
            $_SESSION['mensaje'] = $mensaje;

            header('location: index.php?c=servicio&f=view_edit&id=' . $_POST['id']);
        }
    }

}

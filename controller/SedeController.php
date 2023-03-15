<?php
// autor:Orobio Vásquez Madelyne
require_once 'model/dao/SedeDAO.php';
require_once 'model/dto/SedeDTO.php';

class SedeController
{
  private $model;

  public function __construct()
  { // constructor
    $this->model = new SedeDAO();
    session_start();
  }

  public function index()
  {
    if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {

      $resultados = $this->model->selectAll();

      require_once VSEDE . 'list.php';
    } else {
      header('location: index.php?c=usuario&f=dashbord');
    }
  }



  public function search()
  {
    // lectura de parametros enviados
    $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";

    //comunica con el modelo (enviar datos o obtener datos)
    $resultados = $this->model->selectbyprovincia($parametro);
    // comunicarnos a la vista
    require_once VSEDE . 'list.php';
  }


  public function searchAjax()
  {
    // lectura de parametros enviados
    $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";

    //comunica con el modelo (enviar datos o obtener datos)
    $resultados = $this->model->selectbyprovincia($parametro);
    // comunicarnos a la vista
    echo json_encode($resultados);
  }



  // muestra el formulario de nuevo producto
  public function view_new()
  {

    // comunicarse con la vista
    require_once VSEDE . 'nuevo.php';
  }

  // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
  public function new()
  {
    //cuando la solicitud es por post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // insertar el producto
      // considerar verificaciones
      //if(!isset($_POST['codigo'])){ header('');}
      $sede = new SedeDTO();

      // lectura de parametros
      $sede->setProvincia(htmlentities($_POST['txtprovincia']));
      $sede->setCiudad(htmlentities($_POST['txtciudad']));
      $sede->setHorario(htmlentities($_POST['txthorario']));
      $activo = !empty($_POST['txtactivo']) ? ($_POST['txtactivo'] == "on") ? 1: 0 : 0;
      $sede->setActivo($activo);
      $sede->setDireccion(htmlentities($_POST['txtdireccion']));
      $fecha = new DateTime('NOW');
      $sede->setFecha($fecha->format('Y-m-d H:i:s'));

      //comunicar con el modelo
      $exito = $this->model->insert($sede);

      $msj = 'Sede guardado exitosamente';
      $color = 'success';
      if (!$exito) {
        $msj = "No se pudo realizar el guardado";
        $color = "danger";
      }
      if (!isset($_SESSION)) {
        session_start();
      };
      $_SESSION['mensaje'] = $msj;
      $_SESSION['color'] = $color;
      //llamar a la vista
      header('Location:index.php?c=Sede&f=index');
    }
  }


  // muestra el formulario de editar producto
  public function view_edit()
  {
    //leer parametro
    $id = $_REQUEST['id']; // verificar, limpiar
    //comunicarse con el modelo de sede
    $sede = $this->model->selectOne($id);
    //comunicarse con el modelo de categorias

    // comunicarse con la vista
    require_once VSEDE . 'edit.php';
  }

  // lee datos del formulario de editar producto y lo actualiza en la bdd (modelo)
  public function edit()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // actualizar
      // verificaciones
      //if(!isset($_POST['codigo'])){ header('');}
      // leer parametros
      $sede = new SedeDTO();
      $sede->setId(htmlentities($_POST['id']));
      $sede->setProvincia(htmlentities($_POST['txtprovincia']));
      $sede->setCiudad(htmlentities($_POST['txtciudad']));
      $sede->setHorario(htmlentities($_POST['txthorario']));
      $activo = !empty($_POST['txtactivo']) ? ($_POST['txtactivo'] == "on") ? 1: 0 : 0;
      $sede->setActivo($activo);
      $sede->setDireccion(htmlentities($_POST['txtdireccion']));
      $fecha = new DateTime('NOW');
      $sede->setFecha($fecha->format('Y-m-d H:i:s'));
      //llamar al modelo
      $exito = $this->model->update($sede);
      $msj = 'actualizado exitosamente';
      $color = 'primary';
      if (!$exito) {
        $msj = "No se pudo realizar la actualizacion";
        $color = "danger";
      }
      if (!isset($_SESSION)) {
        session_start();
      };
      $_SESSION['mensaje'] = $msj;
      $_SESSION['color'] = $color;
      //llamar a la vista
      header('Location:index.php?c=sede&f=index');
    }
  }

  public function eliminar(){
    $id = $_REQUEST['id']; // verificar, limpiar
    //comunicarse con el modelo de sede
    $sede = $this->model->eliminar($id);
    //comunicarse con el modelo de categorias

    // comunicarse con la vista
    header('Location:index.php?c=sede&f=index');

  }
}

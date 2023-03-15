<!-- autor: Zuñiga Kayler -->
<!-- autor: Zuñiga Kayler -->
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/icono3.ico" />
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <style>
        .divider:after, .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
            }
            .h-custom {
                height: calc(100% - 73px);
            }
        @media (max-width: 450px) {
            .h-custom {
            height: 100%;
        }
    }
  </style>
  <body>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <a href="index.php"><img src="assets/img/guardia2.png"
          class="img-fluid" alt="security"></a>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <?php
if (!empty($_SESSION['mensaje'])) {
    ?>
             <div class="alert alert-<?php echo $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['mensaje']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <?php
unset($_SESSION['mensaje']);
    unset($_SESSION['color']);

}?><br>
        <div class="card">
            <div>
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">Registro</p>
                </div>
            </div>
          <div class="card-body">
          <form id="form-registro-login" action="index.php?c=login&f=guardar" method="post">
            <div class="form-group">
                <label class="form-label" for="cedula">Cedula</label>
                <input class="form-control" type="text" name="cedula" id="cedula" placeholder="Ingrese su cedula">
            </div>
            <div class="form-group">
                <label class="form-label" for="nombres">Nombres</label>
                <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Ingrese sus nombres">
            </div>
            <div class="form-group">
                <label class="form-label" for="apellidos">Apellidos</label>
                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos">
            </div>
            <div class="form-group">
                <label class="form-label" for="correo">Correo</label>
                <input class="form-control" type="text" name="correo" id="correo" placeholder="Ingrese su correo">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese su contraseña">
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
            <button name="registrar" type="submit" class="btn btn-primary"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrar</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Ya me encuentro registrado <a href="index.php?c=login&f=index"
                class="link-danger">Login</a></p>
          </div>
        </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<br><br><br><br>
<script>
    var registro = document.querySelector("#form-registro-login");
    registro.addEventListener("submit", validarCampos);

    function validarCampos(event){
      var resultado = true;
      var txtCedula = document.getElementById("cedula");
      var txtNombres = document.getElementById("nombres");
      var txtApellidos = document.getElementById("apellidos");
      var txtEmail = document.getElementById("correo");
      var txtpassword = document.getElementById("password");

      var cedulaVal = /^[0-9]{10}$/g;
      var letra = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/i;
      var correo =
          /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
      var contrasenaVal = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

      limpiarMensajes();

      if (txtCedula.value.trim() === "") {
          resultado = false;
          mensaje("El campo cedula es obligatorio*", txtCedula);
      } else if (!cedulaVal.test(txtCedula.value.trim())) {
          resultado = false;
          mensaje("La cedula debe tener 10 digitos", txtCedula);
      }


      if (txtNombres.value.trim() === "") {
          resultado = false;
          mensaje("El campo nombres es obligatorio*", txtNombres);
      } else if (!letra.test(txtNombres.value.trim())) {
          resultado = false;
          mensaje("El nombre solo debe contener letras", txtNombres);
      } else if (txtNombres.value.trim().length > 20) {
          resultado = false;
          mensaje("El nombre es muy largo", txtNombres);
      } else if (txtNombres.value.trim().length < 3) {
          resultado = false;
          mensaje("Por favor, ingrese un nombre valido", txtNombres);
      }

      if (txtApellidos.value.trim() === "") {
          resultado = false;
          mensaje("El campo apellidos es obligatorio*", txtApellidos);
      } else if (!letra.test(txtApellidos.value.trim())) {
          resultado = false;
          mensaje("El apellido solo debe contener letras", txtApellidos);
      } else if (txtApellidos.value.trim().length > 20) {
          resultado = false;
          mensaje("El apellido es muy largo", txtApellidos);
      } else if (txtApellidos.value.trim().length < 3) {
          resultado = false;
          mensaje("Por favor, ingrese un apellido valido", txtApellidos);
      }

      if (txtEmail.value.trim() === "") {
          resultado = false;
          mensaje("El campo correo es obligatorio*", txtEmail);
      } else if (!correo.test(txtEmail.value.trim())) {
          resultado = false;
          mensaje("El correo es incorrecto", txtEmail);
      }

      if (txtpassword.value.trim() === "") {
          resultado = false;
          mensaje("El campo contraseña es obligatorio*", txtpassword);
      } else if (!contrasenaVal.test(txtpassword.value.trim())) {
          resultado = false;
          mensaje(
              "La contraseña debe tener entre 8 y 16 caracteres, un dígito, una minúscula y una mayúscula.",
              txtpassword
          );
      }

      if (!resultado) {
          event.preventDefault();
      }
   }
  function mensaje(cadenaMensaje, elemento) {
        elemento.focus();
        var nodoPadre = elemento.parentNode;
        var nodoMensaje = document.createElement("span");
        nodoMensaje.textContent = cadenaMensaje;
        nodoMensaje.setAttribute("class", "mensajeError");
        nodoMensaje.setAttribute("style", "color: red;");
        nodoPadre.appendChild(nodoMensaje);
  }

  function limpiarMensajes() {
      var mensajes = document.querySelectorAll(".mensajeError");
      for (let i = 0; i < mensajes.length; i++) {
          mensajes[i].remove();
      }
  }
    window.addEventListener("load", function() {
      registro.cedula.addEventListener("keypress", numeros, false);
    });
  function numeros(e){
      var key = window.event ? e.which : e.keyCode;
      if (key < 48 || key > 57) {
        e.preventDefault();
      }
  }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

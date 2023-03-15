<!-- autor: Zuñiga Kayler -->
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/icono3.ico" />
    <title>Login</title>
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

} //end if
?>
        <div class="card">
          <div>
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Iniciar Sesión</p>
            </div>
          </div>
          <div class="card-body">
          <form id="form-login" action="index.php?c=login&f=login" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Correo Electronico</label>
            <input type="text" name="correo" id="correo" class="form-control"
              placeholder="Ingresa tu correo" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control"
              placeholder="Ingresa tu contraseña"/>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Recuerdame
              </label>
            </div>

          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button name="iniciar" type="submit" class="btn btn-primary"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Ingresar</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? <a href="index.php?c=login&f=registro"
                class="link-danger">Registrate</a></p>
          </div>

        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    var login = document.querySelector("#form-login");
    login.addEventListener("submit", validarCampos);

    function validarCampos(event){
      var resultado = true;
      var txtEmail = document.getElementById("correo");
      var txtpassword = document.getElementById("password");

      var correo =
          /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

      limpiarMensajes();

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
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

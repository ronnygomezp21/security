<!-- autor: Zuñiga Kayler -->
<?php
require_once HEADER_ADMIN;?>
<main><br><br><br>
    <div style="text-align: center;" class="container">
    <h2>Editar Usuario</h2>
    </div>
    <div class="container">
    <?php if (!empty($_SESSION['mensaje'])) {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['mensaje']; ?>
</div>
    <?php
unset($_SESSION['mensaje']);}?>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form id="editarUsuario" action="index.php?c=usuario&f=editar" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $usuario['id_usuario']; ?>"/>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="cedula">Cedula</label>
                            <input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo $usuario['cedula']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $usuario['nombres']; ?>">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $usuario['apellidos']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $usuario['correo']; ?>">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario['password']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="rol">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                                <option value="0">Seleccione un rol...</option>
                                <?php foreach ($roles as $rol) {?>
                                    <option value="<?php echo $rol->id_rol; ?>" <?php if ($rol->id_rol == $usuario['id_rol']) {echo 'selected';}?>><?php echo $rol->nombre_rol; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                        <button type="submit" class="btn btn-primary"
                     onclick="if (!confirm('Esta seguro de modificar el usuario?')) return false;" >Actualizar</button>
                    <a href="index.php?c=usuario&f=index" class="btn btn-primary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</main>
<br><br><br>
<script>
   var editar = document.querySelector("#editarUsuario");
   editar.addEventListener("submit", validarCampos);

   function validarCampos(event){
    var resultado = true;
    var txtCedula = document.getElementById("cedula");
    var txtNombres = document.getElementById("nombres");
    var txtApellidos = document.getElementById("apellidos");
    var txtEmail = document.getElementById("correo");
    var txtpassword = document.getElementById("password");
    var txtRol = document.getElementById("rol");

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

    if (txtRol.value.trim() === "0") {
        resultado = false;
        mensaje("El campo rol es obligatorio*", txtRol);
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
  crearUsuario.cedula.addEventListener("keypress", numeros, false);
});
function numeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}
</script>
<?php
require_once FOOTER_ADMIN;?>
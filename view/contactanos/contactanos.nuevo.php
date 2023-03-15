<!-- autor: Quijije Piza Antony José -->
<?php
require_once HEADER;?>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<style>
      body {
        background: black;
        background-image: url(assets/img/segurity.jpeg);
        background-repeat: no-repeat;
        background-size: cover;
        background-origin: border-box;

        opacity: 0.8;
        -moz-opacity: 0.8;
        filter: alpha(opacity=80);
        -khtml-opacity: 0.8;
      }

      #contenedorPrincipalForm {
        padding: 50px;
        height: auto;
      }

      #titulo {
        color: rgb(0, 0, 0);
        text-align: center;
        background: white;
      }

      .parte {
        padding: 8px;
        color: white;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        border: 2px solid rgb(255, 255, 255);
        margin: 10px;
      }

      .contenidoFormulario {
        margin: 50px;
        padding: 30px;
        border: 4px solid rgb(41, 40, 40);
        background-color: rgb(41, 40, 40);
        border-radius: 3px;
        border-bottom: 3px;
        width: max-content;
        width: 700px;
      }

      #formContacto {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding: 10px;
      }

      .parte-3 {
        grid-column-start: 1;
        grid-column-end: 3;
      }

      .parte-4 {
        grid-column-start: 1;
        grid-column-end: 3;
      }

      .parte-5 {
        grid-column-start: 1;
        grid-column-end: 3;
      }

      .parte-8 {
        grid-column-start: 1;
        grid-column-end: 3;
      }

      .parte-9 {
        grid-column-start: 1;
        grid-column-end: 3;
      }

      .parte-10 {
        border: none;
        grid-column-start: 1;
        grid-column-end: 3;
        justify-self: center;
      }

      input {
        border-color: rgb(0, 0, 0);
        border-radius: 3px;
        border-bottom: 3px;
        justify-self: stretch;
      }

      label {
        border-color: rgb(0, 0, 0);
        border-radius: 3px;
        border-bottom: 3px;
        justify-self: stretch;
      }

      .btn {
        padding: 5px;
        width: 100px;
        align-self: auto;
      }
      a {
        font-size: 15px;
        }
    </style>
<div id="contenedorPrincipalForm" class="contenedorPrincipalForm">
<?php
if (!empty($_SESSION['mensaje'])) {
    ?>
             <div class="alert alert-<?php echo $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['mensaje']; ?>
</div>
            <?php
unset($_SESSION['mensaje']);
    unset($_SESSION['color']);

}
?>
      <div class="contenidoFormulario" id="contenidoFormulario">
        <div id="titulo">
          <header>
            <h3>FORMULARIO</h3>
          </header>
        </div>

        <div class="formulario">
          <form  action="index.php?c=contacto&f=nuevo" method="post" id="formContacto">
            <div class="parte parte 1">
              <label> Nombres </label> <br />
              <input
                type="text"
                name="nombre"
                id="nombre"
                class="forIten"
                placeholder="Ingresar nombres..."
              />
            </div>

            <div class="parte parte 2">
              <label> Apellidos </label> <br />
              <input
                type="text"
                name="apellido"
                id="apellido"
                class="forIten"
                placeholder="Ingresar apellidos..."
              />
            </div>

            <div class="parte parte-3">
              <label>Tipo de Documentación:</label> <br />
              <select name="documenTipo" id="documenTipo" class="formItem">
                <option value="0">Seleccione...</option>
                <option value="1">C.I / Pasaporte .</option>
              </select>
              <input
                type="number"
                name="documenId"
                id="documenId"
                class="formItem"
                placeholder="Ingresar #Identificación..."
              />
            </div>

            <div class="parte parte-4">
              <label> Fecha de Nacimiento :</label> <br />
              <input
                type="date"
                name="fechaNacimiento"
                id="fechaNaciemiento"
                class="forIten"
              />
            </div>

            <div class="parte parte-5">
              <label>Estado Civil:</label> <br />
              <select name="estadoC" id="estadoC" class="formItem">
                <option value="0">Seleccione...</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">casado</option>
                <option value="Viudo">Viudo</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="parte parte-6">
              <label> Correo Electrónico </label> <br />
              <input
                type="email"
                name="correo"
                id="correo"
                class="forIten"
                placeholder=" Ingresar correo... "
              />
            </div>

            <div class="parte parte-7">
              <label> Teléfono Movil </label> <br />
              <input
                type="number"
                name="telefono"
                id="telefono"
                class="forIten"
                placeholder=" Ingresar #Telefono... "
              />
            </div>

            <div class="parte parte-10">
              <input
                type="submit"
                class="btn btn-primary"
                value="Enviar"
                name="enviar"
              />
              <input
                type="reset"
                class="btn btn-primary"
                value="Cancelar"
                name="cancelar"
              />
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      var formulario_contactactenos = document.querySelector(
        "#contenidoFormulario"
      );
      formulario_contactactenos.addEventListener("submit", validarCampos);

      function validarCampos(event) {
        var resultado = true;
        var txtNombre = document.getElementById("nombre");
        var txtApellido = document.getElementById("apellido");
        var selectTipo = document.getElementById("documenTipo");
        var selectEstadoCivil = document.getElementById("estadoC");
        var numberTipo = document.getElementById("documenId");
        var numberTelefono = document.getElementById("telefono");
        var txtfecha = document.getElementById("fechaNaciemiento");
        var txtEmail = document.getElementById("correo");
        var txtComentario = document.getElementById("comentario");
        var checkboxTerminos = document.getElementById("terminos");

        var valtelefono = /^[0-9]{10}$/g; //permite datos de numeros
        var Id = /^[0-9]{10}$/g;
        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
        var correo =
          /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        limpiarMensajes();

        //validacion para nombre
        if (txtNombre.value === "") {
          resultado = false;
          mensaje("Nombre es requerido", txtNombre);
        } else if (!letra.test(txtNombre.value)) {
          resultado = false;
          mensaje("Nombre solo debe contener letras", txtNombre);
        } else if (txtNombre.value.length > 20) {
          resultado = false;
          mensaje("Nombre maximo 20 caracteres", txtNombre);
        } else if (txtNombre.value.length < 2) {
          resultado = false;
          mensaje("Por favor, ingrese un nombre valido", txtNombre);
        }

        //validacion para apellido
        if (txtApellido.value === "") {
          resultado = false;
          mensaje("Apellido es requerido", txtApellido);
        } else if (!letra.test(txtApellido.value)) {
          resultado = false;
          mensaje("Apellido solo debe contener letras", txtApellido);
        } else if (txtApellido.value.length > 20) {
          resultado = false;
          mensaje("Apellido maximo 20 caracteres", txtApellido);
        } else if (txtApellido.value.length < 2) {
          resultado = false;
          mensaje("Por favor, ingrese un apellido valido", txtApellido);
        }

        //validacion para tipo de documento
        if (selectTipo.value === null || selectTipo.value === "0") {
          resultado = false;
          mensaje("Debe seleccionar un tipo de documento", selectTipo);
        }

        // validacion para numero de identificacion
        if (numberTipo.value === "") {
          resultado = false;
          mensaje("Ingrese el numero de cedula", numberTipo);
        } else if (!Id.test(numberTipo.value)) {
          resultado = false;
          mensaje(
            "El Numerode identificación debe tener 10 digitos",
            numberTipo
          );
        }

        //validacion para estado civil
        if (
          selectEstadoCivil.value === null ||
          selectEstadoCivil.value === "0"
        ) {
          resultado = false;
          mensaje("Debe seleccionar su Estado Civil", selectEstadoCivil);
        }

        //Validacion para que el telefono tenga 10 digitos
        if (numberTelefono.value === "") {
          resultado = false;
          mensaje("El telefono es requerido", numberTelefono);
        } else if (!valtelefono.test(numberTelefono.value)) {
          resultado = false;
          mensaje("El telefono debe tener 10 digitos", numberTelefono);
        }

        //validacion email
        if (txtEmail.value === "") {
          resultado = false;
          mensaje("Email es requerido", txtEmail);
        } else if (!correo.test(txtEmail.value)) {
          resultado = false;
          mensaje("Email no es correcto", txtEmail);
        }

        // validacion de fecha
        var dato = txtfecha.value;
        var fechaNacimiento = new Date(dato);
        var anioN = fechaNacimiento.getFullYear();

        var fechaAc = new Date(); // fecha actual
        var anioA = fechaAc.getFullYear();

        if (fechaNacimiento > fechaAc) {
          resultado = false;
          mensaje("Fecha no puede ser superior a la actual", txtfecha);
        } else if (anioN < 1930) {
          resultado = false;
          mensaje("Año de nacimiento no puede ser menor a 1930", txtfecha);
        } else if (anioA - anioN < 18) {
          resultado = false;
          mensaje("Debe ser mayor de 18 años", txtfecha);
        }

        if (!resultado) {
          event.preventDefault();
        }
      } //fin de funcion validarCampos()

      function mensaje(cadenaMensaje, elemento) {
        elemento.focus();
        var nodoPadre = elemento.parentNode;
        var nodoMensaje = document.createElement("div");
        nodoMensaje.textContent = cadenaMensaje;
        nodoMensaje.style.color = "yellow";
        nodoMensaje.display = "block";
        nodoMensaje.setAttribute("class", "mensajeError");
        nodoPadre.appendChild(nodoMensaje);
      }

      function limpiarMensajes() {
        var mensajes = document.querySelectorAll(".mensajeError");
        for (let i = 0; i < mensajes.length; i++) {
          mensajes[i].remove();
        }
      }
    </script>
    <?php
require_once FOOTER;?>
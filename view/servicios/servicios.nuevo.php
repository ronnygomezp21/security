<!-- autor: Piguave Cristhian -->
<?php require_once HEADER;?>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<style>
        * {
            box-sizing: border-box;
        }

        body{
            background-image: url(assets/img/guardia3.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .contenedor {
            background-color: #fff;
            margin-block: 5%;
            margin-inline-start: 10%;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 3);
            overflow: hidden;
            width: 600px;
            max-width: 100%;
        }

        .encabezado h2 {
            color: #fff;
            text-align: center;
            background: #404d48;
        }

        h2 {
            color: #fff;
            text-align: center;
            background: #404d48;
        }

        .formulario {
            padding: 30px 40px;
        }

        #formServicio{
            padding: 20px;
        }

        #formServicio label {
            display: inline-block;
            margin-bottom: 5px;
            font-size: 20px;
        }

        #formServicio input {
            border: 4px solid #f0f0f0;
            border-radius: 4px;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;

        }

        #formServicio .radio{
            border: 4px solid #f0f0f0;
            border-radius: 4px;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 98%;
            margin-top: 10px;
        }

        .btnradio{
            margin-top: 10px;
            font-size: 16px;
        }

        #formServicio .formItem{
            border: 4px solid #f0f0f0;
            border-radius: 4px;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 98%;

        }

        #formServicio input[type="radio" ]{
            display: inline;
        }

        #formServicio button {
            background-color: #404749;
            border-radius: 4px;
            color: #fff;
            display: block;
            font-family: inherit;
            font-size: 16px;
            padding: 10px;
            width: 30%;
            margin: 10px auto;
        }
        a {
        font-size: 15px;
        }
    </style>
    <div class="container">
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
    </div>
<div class="contenedor">
        <div class="encabezado">
            <h2> DATOS DEL USUARIO </h2>
        </div>
        <div class="Formulario">
            <form action="index.php?c=servicio&f=nuevo" method="POST" id="formServicio">
                <div>
                    <label> Nombres:</label>
                    <input disabled type="text" placeholder="Ingrese sus nombres " id="nombres" class="formItem" value="<?php echo $_SESSION['nombres']; ?>"/>
                </div>
                <div>
                    <label> Apellidos:</label>
                    <input disabled type="text" placeholder="Ingrese sus apellidos" id="apellidos" class="formItem" value="<?php echo $_SESSION['apellidos']; ?>">
                </div>
                <div>
                    <label>Telefono:</label>
                    <input type="text" placeholder="Ingrese su número" name="telefono" id="telefono" class="formItem" />

                </div>
                <div>
                    <label> Correo:</label>
                    <input disabled type="email" placeholder="Ingrese su correo" id="correo" class="formItem" value="<?php echo $_SESSION['correo']; ?>">
                </div>
                <div class="radio">
                    <h2>ELIJA SU SERVICIO</h2>
                    <label>Servicios:</label>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s1" value="Servicio de guardianía armada a nivel nacional" />Servicio de guardianía armada a nivel nacional
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s2" value="Seguridad Electrónica" />Seguridad Electrónica
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s3" value="Seguridad VIP" />Seguridad VIP
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s4" value="Investigaciones" />Investigaciones
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s5" value="Transporte de Valores" />Transporte de Valores
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s6" value="Cursos de Seguridad" />Cursos de Seguridad
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s7" value="Planes de gestión de seguridad" />Planes de gestión de seguridad
                    </div>
                    <div class="btnradio">
                        <input class="ser" type="radio" name="servicio" id="s8" value="Diseño de sistemas de seguridad" />Diseño de sistemas de seguridad
                    </div>
                </div>
                <button type="submit"> Enviar </button>
            </form>
        </div>
    </div>
    <script>
        var formServicio = document.querySelector("#formServicio");
        formServicio.addEventListener("submit", validarCampos);

        function validarCampos(e){
            var resultado = true;
            var telefono = document.querySelector("#telefono");
            var servicio = document.getElementsByName("servicio");

            var celularaVal = /^[0-9]{10}$/g;

            limpiarMensajes();

            if (telefono.value.trim() === "") {
                resultado = false;
                mensaje("El campo telefono es obligatorio*", telefono);
            } else if (!celularaVal.test(telefono.value.trim())) {
                resultado = false;
                mensaje("El telefono debe tener 10 digitos", telefono);
            }

            var seleccionar = false;
            for (let i = 0; i < servicio.length; i++) {
                if (servicio[i].checked) {
                    seleccionar = true;
                    let res = servicio[i].value;
                    break;
                }
            }
            if (!seleccionar) {
                resultado = false;
                mensaje("Debe seleccionar un servicio", servicio[0]);
            }

            if (!resultado) {
            e.preventDefault();
            }
        }

        function mensaje(cadenaMensaje, elemento) {
            elemento.focus();
            var nodoPadre = elemento.parentNode;
            var nodoMensaje = document.createElement("div");
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
<?php require_once FOOTER;?>
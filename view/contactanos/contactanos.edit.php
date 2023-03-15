<!-- autor: Quijije Piza Antony José -->
<?php
require_once HEADER_ADMIN;?>
<main><br><br><br>
    <div style="text-align: center;" class="container">
    <h2>Editar Contactanos</h2>
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
                <form id="form_editar_contacto" action="index.php?c=contacto&f=editar" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $contacto['id_contactanos']; ?>"/>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="nombres">Nombres</label>
                            <input disabled type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $contacto['nombres']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="apellidos">Apellidos</label>
                            <input disabled type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $contacto['apellidos']; ?>">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="correo">Correo</label>
                            <input disabled type="email" name="correo" id="correo" class="form-control" value="<?php echo $contacto['correo']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="telefono">Telefono</label>
                            <input disabled type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $contacto['telefono']; ?>">
                        </div>
                    </div>
                    <div class="row g-2">
                    <div class="form-group col-md-10">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="2"><?php echo $contacto['descripcion']; ?></textarea>
                    </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                        <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el contacto?')) return false;" >Actualizar</button>
                    <a href="index.php?c=contacto&f=index" class="btn btn-primary">Cancelar</a>
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
   var editar_contacto = document.querySelector("#form_editar_contacto");
   editar_contacto.addEventListener("submit", validarCampos);

   function validarCampos(event){
        var resultado = true;
        var txtDescripcion = document.getElementById("descripcion");


        limpiarMensajes();

        if (txtDescripcion.value.trim() === "") {
        resultado = false;
        mensaje("El campo descripcion es obligatorio*", txtDescripcion);
        }

        if (!resultado) {
            event.preventDefault();
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
<?php
require_once FOOTER_ADMIN;?>
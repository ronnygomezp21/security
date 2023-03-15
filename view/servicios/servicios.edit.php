<!-- autor: Piguave Cristhian -->
<?php
require_once HEADER_ADMIN;?>
<main><br><br><br>
    <div style="text-align: center;" class="container">
    <h2>Editar Servicio</h2>
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
                <form id="form_editar_servicio" action="index.php?c=servicio&f=editar" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $servicio['id_servicio']; ?>"/>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="nombres">Nombres</label>
                            <input disabled type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $servicio['nombres_usuario']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="apellidos">Apellidos</label>
                            <input disabled type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $servicio['apellidos_usuario']; ?>">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="correo">Correo</label>
                            <input disabled type="email" name="correo" id="correo" class="form-control" value="<?php echo $servicio['correo_usuario']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="telefono">Telefono</label>
                            <input disabled type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $servicio['telefono_usuario']; ?>">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                            <label for="servicio">Servicio</label>
                            <input disabled type="text" name="servicio" id="servicio" class="form-control" value="<?php echo $servicio['tipo_servicio']; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="estado_servicio">Estado</label>
                            <select name="estado_servicio" id="estado_servicio" class="form-control">
                                <option value="Pendiente" <?php if ($servicio['estado_servicio'] == 'Pendiente') {echo "selected";}?>>Pendiente</option>
                                <option value="En proceso" <?php if ($servicio['estado_servicio'] == 'En proceso') {echo "selected";}?>>En proceso</option>
                                <option value="Finalizado" <?php if ($servicio['estado_servicio'] == 'Finalizado') {echo "selected";}?>>Finalizado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                    <div class="form-group col-md-10">
                    <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="2"><?php echo $servicio['descripcion']; ?></textarea>
                    </div>
                    </div>
                    <div class="row g-2">
                        <div class="form-group col-md-5">
                        <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el servicio?')) return false;" >Actualizar</button>
                    <a href="index.php?c=servicio&f=index" class="btn btn-primary">Cancelar</a>
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
   var formServicio = document.querySelector("#form_editar_servicio");
   formServicio.addEventListener("submit", validarCampos);

   function validarCampos(event){
        var resultado = true;
        var txtDescripcion = document.getElementById("descripcion");
        var estado = document.getElementById("estado_servicio");


        limpiarMensajes();

        if (txtDescripcion.value.trim() === "") {
        resultado = false;
        mensaje("El campo descripcion es obligatorio*", txtDescripcion);
        }

        if (estado.value.trim() === "") {
        resultado = false;
        mensaje("El campo estado es obligatorio*", estado);
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
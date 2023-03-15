<!-- autor: Quijije Piza Antony José -->
<?php
require_once HEADER_ADMIN;?>
    <main><br><br><br>
    <div style="text-align: center;" class="container">
    <h2>Listado de Contactanos</h2>
    </div>
        <div class="container">
        <?php if (!empty($_SESSION['mensaje'])) {?>
        <div class="alert alert-<?php echo $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['mensaje']; ?>
</div>
    <?php
unset($_SESSION['mensaje']);
    unset($_SESSION['color']);}?>
        <div class="input-group input-group-sm" style="width: 380px;">
                        <input type="search" name="busqueda" id="busqueda" class="form-control float-right" placeholder="Buscar por cedula, pasaporte o correo electronico">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
        </div><br>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap table-striped table-sm" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cedula o Pasaporte</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                                <?php if ($_SESSION['id_rol'] == 1) {?>
                                <th>Acciones</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody class="tabladatos">
                        <?php foreach ($contactanos as $contacto) {?>
                            <tr>
                                <td><?php echo $contacto['id_contactanos']; ?></td>
                                <td><?php echo $contacto['nombres']; ?></td>
                                <td><?php echo $contacto['apellidos']; ?></td>
                                <td><?php echo $contacto['cedula_pasaporte']; ?></td>
                                <td><?php echo $contacto['correo']; ?></td>
                                <td><?php echo $contacto['telefono']; ?></td>
                                <?php $estado = $contacto['estado'];
                                        if ($estado == 1) {
                                            $estado = "Activo";
                                        } else {
                                            $estado = "Inactivo";
                                        }
                                        ?>
                                <td><?php echo $estado; ?></td>
                                <?php if ($_SESSION['id_rol'] == 1) {?>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                    href="index.php?c=contacto&f=view_edit&id=<?php echo $contacto['id_contactanos']; ?>">
                                    <i class="fas fa-marker"></i></a>
                                    <a class="btn btn-danger btn-sm"
                                    onclick="if(!confirm('Esta seguro de eliminar el contacto?'))return false;"
                                    href="index.php?c=contacto&f=eliminar&id=<?php echo $contacto['id_contactanos']; ?>">
                                    <i class="fas fa-trash-alt"></i></a>
                                </td>
                                <?php }?>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </main>
<script type="text/javascript">
    var txtbuscar = document.querySelector("#busqueda");
    txtbuscar.addEventListener('keyup', cargarContactos);

function cargarContactos() {
    var buscar = txtbuscar.value;
    var url = "index.php?c=contacto&f=buscar&b=" + buscar;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    xmlh.onreadystatechange = function () {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            actualizar(respuesta);
        }
    };
}

function actualizar(respuesta) {
    var tbody = document.querySelector('.tabladatos');
    var contactos = JSON.parse(respuesta);
    resultados = '';
    for (var i = 0; i < contactos.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + contactos[i].id_contactanos+ '</td>';
            resultados += '<td>' + contactos[i].nombres+ '</td>';
            resultados += '<td>' + contactos[i].apellidos+ '</td>';
            resultados += '<td>' + contactos[i].cedula_pasaporte+ '</td>';
            resultados += '<td>' + contactos[i].correo+ '</td>';
            resultados += '<td>' + contactos[i].telefono+ '</td>';
            if (contactos[i].estado == 1) {
                resultados += '<td>Activo</td>';
            } else {
                resultados += '<td>Inactivo</td>';
            }
            resultados += '<?php if ($_SESSION['id_rol'] == 1) {?>';
            resultados += '<td>' +
                "<a href='index.php?c=contacto&f=view_edit&id=" + contactos[i].id_contactanos +
                "' " + "class='btn btn-warning btn-sm'><i class='fas fa-marker'></i></a>" + " " +
                "<a href='index.php?c=contacto&f=eliminar&id=" + contactos[i].id_contactanos + "'" +
                "class='btn btn-danger btn-sm' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + contactos[i].cedula_pasaporte
                + " \')) return false; " + " ><i class='fas fa-trash-alt'></i> </a>" + '</td>';
            resultados += '<?php }?>';
            resultados += '</tr>';
    }
    tbody.innerHTML = resultados;
}
</script>
<br><br><br>
<?php
require_once FOOTER_ADMIN;?>

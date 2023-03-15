<!-- autor: Piguave Cristhian -->
<?php
require_once HEADER_ADMIN;?>
    <main><br><br><br>
    <div style="text-align: center;" class="container">
    <h2>Listado de Servicios</h2>
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
                        <input type="search" name="busqueda" id="busqueda" class="form-control float-right" placeholder="Buscar por apellidos, nombres o estado de servicio">
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
                    <table id="tablaServiciosS" class="table table-hover text-nowrap table-striped table-sm" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo Servicio</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <?php if ($_SESSION['id_rol'] == 1) {?>
                                <th>Acciones</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody class="tabladatos">
                        <?php foreach ($servicios as $servicio) {?>
                            <tr>
                                <td><?php echo $servicio['id_servicio']; ?></td>
                                <td><?php echo $servicio['tipo_servicio']; ?></td>
                                <td><?php echo $servicio['apellidos_usuario']; ?></td>
                                <td><?php echo $servicio['nombres_usuario']; ?></td>
                                <td><?php echo $servicio['correo_usuario']; ?></td>
                                <td><?php echo $servicio['telefono_usuario']; ?></td>
                                <td><?php echo $servicio['fecha_creacion']; ?></td>
                                <?php if ($servicio['estado_servicio'] == 'Pendiente') {?>
                                <td><span class="badge badge-danger"><?php echo $servicio['estado_servicio']; ?></span></td>
                                <?php } else if ($servicio['estado_servicio'] == 'En proceso') {?>
                                <td><span class="badge badge-warning"><?php echo $servicio['estado_servicio']; ?></span></td>
                                <?php } else if ($servicio['estado_servicio'] == 'Finalizado') {?>
                                <td><span class="badge badge-success"><?php echo $servicio['estado_servicio']; ?></span></td>
                                <?php }?>
                                <?php if ($_SESSION['id_rol'] == 1) {?>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                    href="index.php?c=servicio&f=view_edit&id=<?php echo $servicio['id_servicio']; ?>">
                                    <i class="fas fa-marker"></i></a>
                                    <a class="btn btn-danger btn-sm"
                                    onclick="if(!confirm('Esta seguro de eliminar el servicio?'))return false;"
                                    href="index.php?c=servicio&f=eliminar&id=<?php echo $servicio['id_servicio']; ?>">
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
    txtbuscar.addEventListener('keyup', cargarServicios);

function cargarServicios() {
    var buscar = txtbuscar.value;
    var url = "index.php?c=servicio&f=buscar&b=" + buscar;
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
    var servicios = JSON.parse(respuesta);
    resultados = '';
    for (var i = 0; i < servicios.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + servicios[i].id_servicio+ '</td>';
            resultados += '<td>' + servicios[i].tipo_servicio+ '</td>';
            resultados += '<td>' + servicios[i].apellidos_usuario+ '</td>';
            resultados += '<td>' + servicios[i].nombres_usuario+ '</td>';
            resultados += '<td>' + servicios[i].correo_usuario+ '</td>';
            resultados += '<td>' + servicios[i].telefono_usuario+ '</td>';
            resultados += '<td>' + servicios[i].fecha_creacion+ '</td>';
            if (servicios[i].estado_servicio == 'Pendiente') {
                resultados += '<td><span class="badge badge-danger">' + servicios[i].estado_servicio+ '</span></td>';
            } else if (servicios[i].estado_servicio == 'En proceso') {
                resultados += '<td><span class="badge badge-warning">' + servicios[i].estado_servicio+ '</span></td>';
            } else if (servicios[i].estado_servicio == 'Finalizado') {
                resultados += '<td><span class="badge badge-success">' + servicios[i].estado_servicio+ '</span></td>';
            }
            resultados += '<?php if ($_SESSION['id_rol'] == 1) {?>';
            resultados += '<td>' +
                "<a href='index.php?c=servicio&f=view_edit&id=" + servicios[i].id_servicio +
                "' " + "class='btn btn-warning btn-sm'><i class='fas fa-marker'></i></a>" + " " +
                "<a href='index.php?c=servicio&f=eliminar&id=" + servicios[i].id_servicio + "'" +
                "class='btn btn-danger btn-sm' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + servicios[i].nombres_usuario
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

<!-- autor: Orobio Vásquez Madelyne -->
<?php require_once HEADER_ADMIN; ?>
<div style="text-align: center;" class="container mt-5 pt-4">
    <h2>Listado de Sedes</h2>
    </div>
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-4">
            <form action="index.php?c=sede&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6">
            <input type="text"  id="busquedaAjax" placeholder="buscar con ajax" class="w-100"/>
        </div>
        <div class="col-sm-2 d-flex flex-column align-items-end">
            <a href="index.php?c=sede&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Horario</th>
                <th>Activo</th>
                <th>Dirección</th>
                <th>Fecha</th>
                <?php if ($_SESSION['id_rol'] == 1) { ?>
                <th>Acciones</th>
                <?php } ?>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id'] ?></td>
                        <td><?php echo $fila['provincia'] ?></td>
                        <td><?php echo $fila['ciudad'] ?></td>
                        <td><?php echo $fila['horario'] ?></td>
                        <td><?php echo $fila['activo'] ?></td>
                        <td><?php echo $fila['direccion'] ?></td>
                        <td><?php echo $fila['fecha_act'] ?></td>
                        <?php if ($_SESSION['id_rol'] == 1) { ?>
                        <td>
                            <a class="btn btn-warning btn-sm" href="index.php?c=sede&f=view_edit&id=<?php echo  $fila['id']; ?>">
                                <i class="fas fa-marker"></i></a>
                                <a class="btn btn-danger btn-sm"
                                    onclick="if(!confirm('Esta seguro de eliminar la sede?'))return false;"
                                    href="index.php?c=sede&f=eliminar&id=<?php echo $fila['id']; ?>">
                                    <i class="fas fa-trash-alt"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    var txtbuscar = document.querySelector("#busquedaAjax");
    txtbuscar.addEventListener('keyup', cargarsedes);

function cargarsedes() {
    var buscar = txtbuscar.value;
    var url = "index.php?c=sede&f=searchAjax&b=" + buscar;
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
    var sedes = JSON.parse(respuesta);
    resultados = '';
    for (let i = 0; i < sedes.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + sedes[i].id+ '</td>';
            resultados += '<td>' + sedes[i].provincia+ '</td>';
            resultados += '<td>' + sedes[i].ciudad+ '</td>';
            resultados += '<td>' + sedes[i].horario+ '</td>';
            resultados += '<td>' + sedes[i].activo+ '</td>';
            resultados += '<td>' + sedes[i].direccion+ '</td>';
            resultados += '<td>' + sedes[i].fecha_act+ '</td>';
            resultados += '<?php if ($_SESSION['id_rol'] == 1) {?>';
            resultados += '<td>' +
                "<a href='index.php?c=sede&f=view_edit&id=" + sedes[i].id +
                "' " + "class='btn btn-warning btn-sm'><i class='fas fa-marker'></i></a>" + " " +
                "<a href='index.php?c=sede&f=eliminar&id=" + sedes[i].id + "'" +
                "class='btn btn-danger btn-sm' onclick = 'if (!confirm(\'Desea eliminar sede\')) return false; " + " ><i class='fas fa-trash-alt'></i> </a>" + '</td>';
            resultados += '<?php }?>';
            resultados += '</tr>';
    }
    tbody.innerHTML = resultados;
}
</script>

<?php require_once FOOTER_ADMIN; ?>
<!-- autor: Zuñiga Kayler -->
<?php
require_once HEADER_ADMIN;?>
    <main><br><br><br>
    <div style="text-align: center;" class="container">
    <h2>Listado de Usuarios</h2>
    </div>
        <div class="container">
        <?php if (!empty($_SESSION['mensaje'])) {?>
        <div class="alert alert-<?php echo $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['mensaje']; ?>
</div>
    <?php
unset($_SESSION['mensaje']);
    unset($_SESSION['color']);}?>
        <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="search" name="busqueda" id="busqueda" class="form-control float-right" placeholder="Buscar por cedula o apellidos">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
        </div><br>
            <div class="card">
                <div class="card-header">
                    <a href="index.php?c=usuario&f=view_new" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Agregar</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="tabladatos">
                        <?php foreach ($usuarios as $usuario) {?>
                            <tr>
                                <td><?php echo $usuario['cedula']; ?></td>
                                <td><?php echo $usuario['apellidos']; ?></td>
                                <td><?php echo $usuario['nombres']; ?></td>
                                <td><?php echo $usuario['correo']; ?></td>
                                <td><?php echo $usuario['nombre_rol']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                    href="index.php?c=usuario&f=view_edit&id=<?php echo $usuario['id_usuario']; ?>">
                                    <i class="fas fa-marker"></i></a>
                                    <a class="btn btn-danger btn-sm"
                                    onclick="if(!confirm('Esta seguro de eliminar el usuario?'))return false;"
                                    href="index.php?c=usuario&f=eliminar&id=<?php echo $usuario['id_usuario']; ?>">
                                    <i class="fas fa-trash-alt"></i></a>
                                </td>
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
    txtbuscar.addEventListener('keyup', cargarUsuarios);

function cargarUsuarios() {
    var buscar = txtbuscar.value;
    var url = "index.php?c=usuario&f=buscar&b=" + buscar;
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
    var usuarios = JSON.parse(respuesta);
    resultados = '';
    for (var i = 0; i < usuarios.length; i++) {
        resultados += '<tr>';
        resultados += '<td>' + usuarios[i].cedula+ '</td>';
        resultados += '<td>' + usuarios[i].apellidos+ '</td>';
        resultados += '<td>' + usuarios[i].nombres+ '</td>';
        resultados += '<td>' + usuarios[i].correo+ '</td>';
        resultados += '<td>' + usuarios[i].nombre_rol+ '</td>';
        resultados += '<td>' +
            "<a href='index.php?c=usuario&f=view_edit&id=" + usuarios[i].id_usuario +
            "' " + "class='btn btn-warning btn-sm'><i class='fas fa-marker'></i></a>" + " " +
            "<a href='index.php?c=usuario&f=eliminar&id=" + usuarios[i].id_usuario + "'" +
            "class='btn btn-danger btn-sm' onclick = 'if(!confirm('Esta seguro de eliminar el usuario?'))return false;" + " ><i class='fas fa-trash-alt'></i> </a>" + '</td>';
        resultados += '</tr>';
    }
    tbody.innerHTML = resultados;

}

</script>
<br><br><br>
<?php
require_once FOOTER_ADMIN;?>

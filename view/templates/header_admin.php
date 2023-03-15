
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="assets/img/icono3.ico" />
        <link href="assets/css/styles.css" rel="stylesheet">
        <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        <title>Administracion</title>
    </head>
    <body>
       <header>
                <nav class="barraNavegacion navbar navbar-expand-md navbar-dark fixed-top">
                <a class="navbar-brand" href="index.php?c=usuario&f=dashbord">Security S.A</a>
                <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?c=usuario&f=dashbord">Home</a></li>
                    <?php if ($_SESSION['id_rol'] == 1) {?>
                    <li class="nav-item"><a class="nav-link" href="index.php?c=usuario&f=index">Usuarios</a></li>
                    <?php }?>
                    <li class="nav-item"><a class="nav-link" href="index.php?c=servicio&f=index">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?c=sede&f=index">Sedes</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?c=contacto&f=index">Contactanos</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item my-auto"><span style="color:white"><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos'] . ' - ' . $_SESSION['nombre_rol']; ?> </span></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?c=login&f=logout">Cerrar Sesion</a></li>
                </ul>
                </nav>
        </header>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="shortcut icon" href="assets/img/icono3.ico" />
    <link rel="stylesheet" href="assets/css/estilo.css" />

    <style>
      /*configurando imgen de guardia en la parte superior*/
      .banner {
        background-image: url("assets/img/guardia.jpg");
        background-color: #cccccc;
        background-repeat: no-repeat;
        width: 100%;
        height: 550px;
        background-position: center;
        background-size: cover;
        align-items: center;
        padding-top: 100px;
      }

      .banner div {
        border-radius: 15px;
        color: #0e0e11;
        background-color: #ebf4ff3b;
        font-weight: bold;
        font-size: 25px;
        font-style: oblique;
        text-align: justify;
        width: 50%;
        padding: 20px;
        margin: auto 50px auto auto;
      }

      /*configurando el video y el parrafo a su lado*/
      iframe {
        display: block;
        margin: 15px;
        width: 90%;
        height: 400px;
      }

      .bloque {
        margin: 0 auto;
        content: "";
      }

      .bloque .parte {
        float: left;
        width: 45%;
        color: #ffffff;
        margin: 30px 0 40px 40px;
      }

      .bloque img {
        width: 100%;
        height: 430px;
        object-fit: cover;
        border-radius: 30px;
      }

      .limpiarfloat {
        clear: both;
      }

      .bloque h3,
      .bloque h4 {
        margin-top: 10%;
        font-size: 40px;
        padding-bottom: 10px;
      }

      .bloque p,
      .bloque li {
        font-size: 25px;
        text-align: justify;
      }

      .bloque ol {
        padding-left: 40px;
      }

      .img-slider {
        position: relative;
        width: 100%;
        height: 500px;
        margin: 10px auto;
        background: rgba(218, 165, 32, 0.164);
      }

      .img-slider .slide {
        z-index: 1;
        position: absolute;
        width: 100%;
        object-fit: cover;
        clip-path: circle(0% at 0 50%);
      }

      .img-slider .slide.active {
        clip-path: circle(100%);
        transition: 2s;
        transition-property: all;
      }

      .img-slider .slide img {
        z-index: 1;
        width: 100%;
        height: 500px;
      }

      .img-slider .slide .info {
        position: absolute;
        top: 0;
        padding:15px;
      }

      .img-slider .slide .info h2 {
        color: #fff;
        font-size: 45px;
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 2px;
        padding-left: 60px;
        margin-top: 60px;
      }

      .img-slider .slide .info p {
        color: #fff;
        background: #00000052;
        font-size: 20px;
        width: 60%;
        padding: 10px;
        border-radius: 25px;
        margin-left: 40px;
      }

      .img-slider .navigacion {
        z-index: 2;
        position: absolute;
        display: flex;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
      }

      .img-slider .navigacion .btn {
        background: rgba(255, 255, 255, 0.5);
        width: 12px;
        height: 12px;
        margin: 10px;
        border-radius: 50%;
        cursor: pointer;
      }

      .img-slider .navigacion .btn.active {
        background: #2696e9;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
      }

      @media (max-width: 820px) {
        .img-slider {
          width: 600px;
          height: 375px;
        }

        .img-slider .slide .info {
          padding: 10px 25px;
        }

        .img-slider .slide .info h2 {
          font-size: 35px;
        }

        .img-slider .slide .info p {
          width: 100%;
          font-size: 15px;
        }

        .img-slider .navigacion {
          bottom: 25px;
        }

        .img-slider .navigacion .btn {
          width: 10px;
          height: 10px;
          margin: 8px;
        }
      }

      @media (max-width: 620px) {
        .img-slider {
          width: 400px;
          height: 250px;
        }

        .img-slider .slide .info {
          padding: 10px 20px;
        }

        .img-slider .slide .info h2 {
          font-size: 30px;
        }

        .img-slider .slide .info p {
          width: 80%;
          font-size: 13px;
        }

        .img-slider .navigacion {
          bottom: 15px;
        }

        .img-slider .navigacion .btn {
          width: 8px;
          height: 8px;
          margin: 6px;
        }
      }

      @media (max-width: 420px) {
        .img-slider {
          width: 320px;
          height: 200px;
        }

        .img-slider .slide .info {
          padding: 5px 10px;
        }

        .img-slider .slide .info h2 {
          font-size: 25px;
        }

        .img-slider .slide .info p {
          width: 90%;
          font-size: 11px;
        }

        .img-slider .navigacion {
          bottom: 10px;
        }
      }
        .banner2 {
        background-image: url("assets/img/guardia2.png");
        background-color: #cccccc;
        background-repeat: no-repeat;
        width: 100%;
        height: 500px;
        background-position: center;
        background-size: cover;
        align-items: center;
        padding-top: 100px;
      }

      .banner2 div {
        border-radius: 15px;
        color: #0e0e11;
        font-weight: bold;
        font-size: 30px;
        font-style: oblique;
        text-align: justify;
        width: 60%;
        padding: 20px;
        margin-left: 20px;
      }

    </style>
  </head>

  <body>
    <header>
      <nav class="menu" id="menu">
        <a href="#"
          ><img style="float: left" src="assets/img/logo.png" alt="logo"
        /></a>
        <a href="index.php"
          ><img style="float: left" src="assets/img/slogan3.png" alt="slogan"
        /></a>
        <ul>
          <li>
            <a href="index.php">Inicio </a>
          </li>
          <li>
            <a href="index.php?c=home&f=servicios">Servicios</a>
          </li>
          <?php if (isset($_SESSION['nombres'])) {?>
          <?php } else {?>
            <li>
            <a href="index.php?c=home&f=nuestro_equipo">Nuestro Equipo </a>
          </li>
            <?php }?>
          <li>
            <a href="index.php?c=home&f=seguridad_electronica">Seguridad Electrónica</a>
          </li>
          <?php if (isset($_SESSION['nombres'])) {?>
            <?php } else {?>
          <li>
            <a href="index.php?c=home&f=preguntas_frecuentes">Preguntas Frecuentes</a>
          </li>
          <?php }?>
          <?php if (isset($_SESSION['nombres'])) {?>
            <li>
            <!--a href="index.php?c=perfil&f=perfil">Perfil</a-->
          </li>
            <?php } else {?>
          <li>
            <a href="index.php?c=home&f=contacto">Contacto</a>
          </li>
          <?php }?>
            <?php if (isset($_SESSION['nombres'])) {?>
          <li>
            <a href="index.php?c=login&f=logout">Cerrar Sesion</a>
          </li>
            <?php } else {?>
          <li>
            <a href="index.php?c=login&f=index">Iniciar Sesion</a>
          </li>
            <?php }?>
        </ul>
      </nav>
    </header>
<?php
require_once HEADER; ?>
<style>
        p {
            color: #ffffff;
            text-align: justify;
            font-size: 20px;
        }

        .titulo{
            color: #ffffff;
            text-align: center;
            font-size: 25px;
            background-size: 100%;
    
        }

        .contenedor {
            width: 95%;
            padding: 10px;
            display: flex;
            margin: 20px auto;
        }
        .contenedorF{
            width: 100%;
            padding: 25px;
            float: right;
            margin: 20px auto;
            background-color:slategrey;
            border-radius: 25px;   
        }

        .lista {
            color: #ffffff;
            text-align: justify;
            font-size: 18px;
            margin: auto auto auto 40px;
        }
        
        .compromiso {
            width: 80%;
            margin: 25px auto;
        }

        .compromiso h1 {
            text-align: center;
            font-size: 40px;
            background-color:#04042e;
            border-radius: 30px;
        }

        .imagen {
            width: 300px;
            object-fit: cover;
            border-radius: 20px;
        }
        .imagenF{
            float: right;
            width: 300px;
            border-radius: 20px;
        }

        .slider{
            width: 100%;
            height: 200px;
            animation: slide 10s infinite alternate linear;
            object-fit: cover;
        }

        
        @keyframes slide {
        0%, 30% {
      background-image: url(assets/img/baner1.jpg);    
        }
        35%, 65% {
        background-image: url(assets/img/baner2.jpg) ;   
        }

        70%, 100% {
        background-image: url(assets/img/banner3.jpg) ;   
        }

        }
        /*Galería de Fotos*/

        .carrusel {
    display: flex;
    gap: 10px;
    justify-content: center;
    
  }
  
  .carrusel ul {
    list-style: none;
    margin: 0;
    padding: 0;
    max-width: 800px;
    scroll-behavior: smooth;
    border-radius: 20px;
    object-fit: contain;
  }
  
  .carrusel-fotos {
    display: flex;
    gap: 10px;
    overflow: auto;
  }
  
  .carrusel-fotos img {
    background: #000000;
    border: 2px solid #000000;
    width: 400px;
    height: 300px;
    
  }
  
  .carrusel-menu {
    display: none;
  }
  
  @media screen and (min-width: 500px) {
    .carrusel-fotos {
      overflow: hidden;
    }
  
    .carrusel-fotos img {
      width: 400px;
      height: 300px;
      object-fit: cover;
    }
    .carrusel-menu {
      display: block;
    }
    .carrusel-menu img {
      box-sizing: border-box;
      width: 50px;
      height: 40px;
      border: 5px solid #000000;
    }
    .carrusel-menu img:hover {
      border: none;
    }
  }
     #enlace{
        display:grid;
        width: 170px;
        font-family:Arial, Helvetica, sans-serif;
        font-weight: 700;
        border-radius: 10px;
        padding: 15px 30px;
        margin: 15px 30px;
        background-color: #130842d2;
        text-decoration: none;
        color: #ffffff;
        float: right;
     }
     #boton{
        color: #8a2be2;
        text-align: center;
        background-color: #7fffd4;
        display: block;
        padding: 1px;
        margin: 5px;
        margin-top: 250px;
        display: flex;
        border-radius: 10px;
        
     }
        /*Cierra Galería Fotos*/
    </style>
<div class="slider">
    </div>
    <main>
        <section class="compromiso">
            <h1 style="color :#ffffff">Compañía de Vigilancia y Seguridad Privada</h1> <br>
            <p>Security S.A. cuenta con un Equipo de profesionales para la actividad que realizamos, garantizando un
                servicio de la más alta calidad.
                Nuestro Personal operativo es reclutado, seleccionado y contratado previo un riguroso proceso,
                cumpliendo los perfiles y requerimientos que cada proyecto de seguridad lo requiera y exija.</p>

        </section>
        <section style="margin-top: 70px ;">
            <div class="contenedor">
                <input type="button" onclick="mostrar(this)" value="ocultar" id="boton">
                <img class="imagen" src="assets/img/compromiso.jpg" id="img" alt="seguridad"/>
               <div> 
                <h3 class="titulo" style="text-align:center; margin-bottom: 30px;">NUESTRO COMPROMISO CON EL PERSONAL OPERATIVO</h3>
                <ol class="lista">
                    <li>Contrato de trabajo</li>
                    <li>Afiliación al IESS</li>
                    <li>Pago de sueldo Básico más horas extras</li>
                    <li>Pago de fondos de reserva</li>
                    <li>Beneficios de Ley que incluye: décimo tercero, décimo cuarto y vacaciones</li>
                    <li>Crecimiento Laboral</li>
                    <li>Capacitación Permanente con certificaciones y diplomas</li>
                    <li>Póliza de vida por un valor de $ 50.000</li>
                    <li>Póliza de accidentes personales por un valor de $ 20.000</li>
                </ol>
            </div>
            </div>
        </section>
        <section>
            <div class="contenedorF">
                <img class="imagenF" src="assets/img/fortaleza.jpg" alt="seguridad" />
                <div>
                    <h4 class="titulo" style="text-align:center; margin-bottom: 30px;">NUESTRAS FORTALEZAS </h4>
                    <ol class="lista">
                        <li>Certificación de nuestro <b>SISTEMA DE GESTION DE CALIDAD</b>conforme las normas
                            internacionales <b>ISO 9001:2015.</b></li>
                        <li>Reglamento Interno de la empresa <b>autorizado por el Ministerio de Relaciones
                                Laborales.</b></li>
                        <li>Reglamento de Seguridad y Salud Ocupacional otorgado por el <b>Ministerio de
                                Relaciones Laborales.</b></li>
                        <li>Somos miembros activos de Cámara de Comercio de Quito</li>
                        <li>Afiliados en <b>ANESI</b></li>
                        <li>Afiliados en la <b>CASEPEC</b></li>
                    </ol>
                </div>
            </div>
        </section>
        <section>
            <h5 class="titulo" style="text-align: center;">PERSONAL ADMINISTRATIVO</h5>
            <div class="carrusel">
                <ul class="carrusel-fotos">
                  <li id="foto1"><img src="assets/img/foto1.jpg" alt=""></li>
                  <li id="foto2"><img src="assets/img/foto2.jpg" alt=""></li>
                  <li id="foto3"><img src="assets/img/foto3.jpg" alt=""></li>
                  <li id="foto4"><img src="assets/img/foto4.jpg" alt=""></li>
                </ul>
                <ul class="carrusel-menu">
                  <li><a href="#foto1"><img src="assets/img/foto1.jpg" alt=""></a></li>
                  <li><a href="#foto2"><img src="assets/img/foto2.jpg" alt=""></a></li>
                  <li><a href="#foto3"><img src="assets/img/foto3.jpg" alt=""></a></li>
                  <li><a href="#foto4"><img src="assets/img/foto4.jpg" alt=""></a></li>
                </ul>
            </div>
        </section>
        <section>
            <h3 class="titulo" style="text-align: center;">PERSONAL DE SEGURIDAD Y VIGILANCIA</h3>
            <div class="carrusel">
                <ul class="carrusel-fotos">
                  <li id="P1"><img src="assets/img/P1.jpg" alt=""></li>
                  <li id="P2"><img src="assets/img/P2.jpg" alt=""></li>
                  <li id="P3"><img src="assets/img/P3.jpg" alt=""></li>
                  <li id="P4"><img src="assets/img/P4.jpg" alt=""></li>
                </ul>
                <ul class="carrusel-menu">
                  <li><a href="#P1"><img src="assets/img/P1.jpg" alt=""></a></li>
                  <li><a href="#P2"><img src="assets/img/P2.jpg" alt=""></a></li>
                  <li><a href="#P3"><img src="assets/img/P3.jpg" alt=""></a></li>
                  <li><a href="#P4"><img src="assets/img/P4.jpg" alt=""></a></li>
                </ul>
            </div>
        </section>
        <div class="link">
            <a href="Formulario_QuijieAnthony.html" id="enlace" target="blank">Contáctanos</a>
        </div>
        <div style="clear: both; margin: 0;"></div>
    </main>
    <script>

        function mostrar(input){
           var img=document.getElementById("img")
            if(input.value=="ocultar"){
                img.style.visibility="hidden";
                input.value="mostrar"
            }
            else{
                img.style.visibility="visible";
                input.value="ocultar"
            }
        }
    </script>
<?php
require_once FOOTER; ?>
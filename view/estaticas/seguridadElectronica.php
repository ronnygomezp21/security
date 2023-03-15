<?php
require_once HEADER; ?>
<style>
      body {
        background-color: #0b1936c0;
        color: #ffffff;
      }
      h2,
      h3,
      h4 {
        color: goldenrod;
      }
     
      #art1,
      #img1,
      #p1 {
        float: left;
        width: 30%;
      }
      #img1,
      #img2,
      #img3 {
        width: 400px;
        height: 200px;
      }
      #t2 {
        float: right;
      }
      #art2,
      #img2,
      #p2 {
        float: right;
        width: 30%;
      }

      #art3,
      #img3,
      #p3 {
        float: left;
        width: 30%;
      }
      #pa,
      #form {
        /* float: left; */
        width: 50%;
      }
      .clearFloat {
        clear: both;
        margin: 0;
      }

      #galeria1,
      #galeria2,
      #galeria3,
      #galeria4,
      #galeria5,
      #galeria6,
      #galeria7,
      #galeria8,
      #galeria9 {
        float: left;
        width: 20%;
        margin: 5px;
      }

      .clearFloat {
        clear: both;
        margin: 0;
      }

      #galeria img {
        /* width: 100%; */
        height: auto;
        border-radius: 5px;
        cursor: pointer;
      }

      #img-activa {
        width: 100%;
        height: auto;
      }

      /*Contenedor Principal del Lightbox*/

      #contenedor-principal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.55);
        display: none;
        justify-content: center;
        align-items: center;
      }

      /*Contenedor interno del Lightbox*/

      #contenedor-interno {
        border: 2px #f3f3f3 solid;
        padding: 2px;
        background: #3f3f3f;
        max-width: 500px;
        min-height: 400px;
        position: relative;
        display: flex;
        justify-content: center;
      }

      /*Botones*/

      button {
        cursor: pointer;
        background: transparent;
        border: none;
        color: #f3f3f3;
      }

      #btn-cierra {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 3rem;
      }

      #btn-retrocede {
        position: absolute;
        top: 50%;
        left: 0;
        font-size: 3rem;
      }

      #btn-adelanta {
        position: absolute;
        top: 50%;
        right: 0;
        font-size: 3rem;
      }

      .btn {
        height: 45px;
        line-height: 45px;
        width: 50%;
        background-color: #000;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: 0.1s ease all;
        margin: 20px;
      }
      .ruta {
        text-align: center;
      }
    </style>
 <main style="width: 95%; margin: auto">
      <section>
        <h2>SEGURIDAD ELECTRÓNICA</h2>
        <p>
          Nuestro enfoque en tecnología nos permite satisfacer las necesidades
          de control, seguridad e información para nuestros clientes, brindando
          la tranquilidad y respaldo que necesitan.
        </p>
        <article class="art1" style="margin-top: 20px">
          <h3 id="t1">MONITOREO</h3>
          <img id="img1" src="assets/img/monitoreo.jpg" alt="Centrales de Monitoreo" />
          <p id="p1">
            El servicio de monitoreo 24/7 actúa de manera oportuna ante señales
            recibidas en nuestra central de monitoreo y respuesta, estas señales
            son emitidas por un panel de alarmas y acorde a nuestros protocolos,
            los monitoristas reaccionarán dependiendo del tipo de señal
            recibida, a más de la posibilidad de que el usuario pueda recibir en
            tiempo real notificaciones por correo o SMS.
          </p>
        </article>
        <div class="clearFloat"></div>

        <article class="art2" style="margin-top: 20px">
          <h3 id="t2">HOGARES Y EMPRESAS</h3>
          <div class="clearFloat"></div>

          <img id="img2" src="assets/img/hogar.jpg" alt="Hogar y empresa" />
          <p id="p2">
            Instalamos y monitoreamos sistemas de alarma modernos y confiables,
            diseñados para mejorar la seguridad en su hogar o empresa.
            Proponemos diseños óptimos y personalizados que se adaptan a los
            riesgos de cada propiedad. Este sistema puede ser combinado con:
          </p>
          <div class="clearFloat"></div>
        </article>
        <div class="clearFloat"></div>

        <article class="art3" style="margin-top: 20px">
          <h3 id="t3">CCTV</h3>
          <img id="img3" src="assets/img/cctv.jpg" alt="cctv" />
          <p id="p3">
            Gracias a los sistemas de videovigilancia que Oceansecurity oferta,
            se podrá verificar lo que está sucediendo en su hogar o empresa de
            manera simple, incluso aunque no pueda estar allí. <br />
            Controle que se estén realizando las actividades pautadas, que
            ingrese solamente personal autorizado a áreas de importancia y que
            todo esté como de costumbre.
          </p>
        </article>
        <div class="clearFloat"></div>
      </section>
      <article>
        <h2>Galeria de Imagenes</h2>

        <section id="galeria">
          <h3>Galeria</h3>
          <img
            id="galeria1"
            src="assets/img/img-galeria1.jpeg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria2"
            src="assets/img/img-galeria2.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria3"
            src="assets/img/img-galeria3.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria4"
            src="assets/img/img-galeria4.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria5"
            src="assets/img/img-galeria5.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria6"
            src="assets/img/img-galeria6.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria7"
            src="assets/img/img-galeria7.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria8"
            src="assets/img/img-galeria8.jpg"
            alt="galeria de imagenes"
          />
          <img
            id="galeria9"
            src="assets/img/img-galeria9.jpg"
            alt="galeria de imagenes"
          />
        </section>

        <section id="contenedor-principal">
          <h3>Galeria</h3>
          <div id="contenedor-interno">
            <img
              id="img-activa"
              src="assets/img/img-galeria1.jpeg"
              alt="galeria de imagenes"
            />
            <button id="btn-cierra" type="button">x</button>
            <button id="btn-retrocede" type="button">&lt;</button>
            <button id="btn-adelanta" type="button">&gt;</button>
          </div>
        </section>
      </article>
      <div class="clearFloat"></div>
      <div class="ruta">
        <button
          type="button"
          class="btn"
          onclick="location.href='MoranJoan2.html'"
        >
          Postular a una vacante de empleo
        </button>
      </div>
    </main>
    <div class="clearFloat"></div>
    <script>
      /*Variables*/

      const btnCierra = document.querySelector("#btn-cierra");
      const btnAdelanta = document.querySelector("#btn-adelanta");
      const btnRetrocede = document.querySelector("#btn-retrocede");
      const imagenes = document.querySelectorAll("#galeria img");
      const lightbox = document.querySelector("#contenedor-principal");
      const imagenActiva = document.querySelector("#img-activa");
      let indiceImagen = 0;

      /*Abre el Lightbox*/

      const abreLightbox = (event) => {
        imagenActiva.src = event.target.src;
        lightbox.style.display = "flex";
        indiceImagen = Array.from(imagenes).indexOf(event.target);
      };

      imagenes.forEach((imagen) => {
        imagen.addEventListener("click", abreLightbox);
      });

      /*Cierra el Lightbox */

      btnCierra.addEventListener("click", () => {
        lightbox.style.display = "none";
      });

      /* Adelanta la imagen*/

      const adelantaImagen = () => {
        if (indiceImagen === imagenes.length - 1) {
          indiceImagen = -1;
        }
        imagenActiva.src = imagenes[indiceImagen + 1].src;
        indiceImagen++;
      };

      btnAdelanta.addEventListener("click", adelantaImagen);

      /*Retrocede la Imagen*/

      const retrocederImagen = () => {
        if (indiceImagen === 0) {
          indiceImagen = imagenes.length;
        }
        imagenActiva.src = imagenes[indiceImagen - 1].src;
        indiceImagen--;
      };

      btnRetrocede.addEventListener("click", retrocederImagen);
    </script>
<?php
require_once FOOTER; ?>
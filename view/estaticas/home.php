<?php
require_once HEADER; ?>

<div class="img-slider">
      <div class="slide active">
        <img src="assets/img/caro1.jpg" alt="caro1" />
        <div class="info">
          <h2>Security S.A.</h2>
          <p>
            Es una Organización de seguridad especializada, certificada, vanguardista por antonomasia, 
            fortalecida por su trayectoria en la industria de la seguridad privada en Ecuador,  fundamentada en 
            la ética y profesionalismo de su talento humano, y soportada en una plataforma tecnológica de última generación.
          </p>
        </div>
      </div>
      <div class="slide">
        <img src="assets/img/caro3.jpg" alt="caro3" />
        <div class="info">
          <h2>Nuestro Personal</h2>
          <p>
            La constante capacitación a nuestro personal y el cumplimiento de nuestras obligaciones ligado al excelente
            servicio brindado nos ha permitido ubicarnos dentro de una de las mejores empresas de seguridad privada del país.
            Además de contar con todos los recursos y herramientas para cumplir con exito todos los objetivos.
          </p>
        </div>
      </div>
      <div class="slide">
        <img src="assets/img/caro4.jpg" alt="caro4" />
        <div class="info">
          <h2>Seguridad Electrónica</h2>
          <p>
           Security S.A. ofrece soluciones compuestas por la última tecnología en sistemas de Alarmas de Intrusión,
            Detección, Controles de Acceso y Circuitos Cerrados de Televisión, ajustados a las necesidades de nuestros clientes.
          </p>
        </div>
      </div>
      <div class="slide">
        <img src="assets/img/caro2.png" alt="caro2" />
        <div class="info">
          <h2>Certificaciones</h2>
          <p style="width:800px ">
            Security S.A. cuenta con certificaciones avaladas internacionalmente:
             <br> NORMA ISO 9001
             <br>Certificado BASC
             <br>NORMA CAB-IS-SS-10402
             <br>Ministerio de Transporte y Obras Públicas (MTOP)
          </p>
        </div>
      </div>
      <div class="navigacion">
        <div class="btn active"></div>
        <div class="btn"></div>
        <div class="btn"></div>
        <div class="btn"></div>
      </div>
    </div>

    <script>
      var slides = document.querySelectorAll(".slide");
      var btns = document.querySelectorAll(".btn");
      let currentSlide = 1;

      var manualNav = function (manual) {
        slides.forEach((slide) => {
          slide.classList.remove("active");

          btns.forEach((btn) => {
            btn.classList.remove("active");
          });
        });

        slides[manual].classList.add("active");
        btns[manual].classList.add("active");
      };

      btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
          manualNav(i);
          currentSlide = i;
        });
      });

      var repeat = function (activeClass) {
        let active = document.getElementsByClassName("active");
        let i = 1;

        var repeater = () => {
          setTimeout(function () {
            [...active].forEach((activeSlide) => {
              activeSlide.classList.remove("active");
            });

            slides[i].classList.add("active");
            btns[i].classList.add("active");
            i++;

            if (slides.length == i) {
              i = 0;
            }
            if (i >= slides.length) {
              return;
            }
            repeater();
          }, 10000);
        };
        repeater();
      };
      repeat();
    </script>

    <div id="principal">
      <div class="banner">
        <div>
          <h2 style="text-align: center">¿Quiénes somos?</h2>
          <br />
          <p>
            Somos una empresa con 25 años de experiencia en el mercado de la
            seguridad, actualmente nos encontramos dentro de las 10 empresas más
            grandes de seguridad privada del Ecuador.
          </p>
        </div>
      </div>

      <div class="bloque">
        <div class="parte">
          <iframe
            src=""
            title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>

        <section class="parte">
          <h3 style="text-align: center">Nuestra Historia</h3>
          <hr style="border: 2px solid goldenrod" />
          <p>
            Te invitamos a conocer nuestras instalaciones en el video
            corporativo de Security S.A. Tenemos como finalidad el prevenir,
            detener, disminuir o disuadir los atentados o amenazas que puedan
            afectar la seguridad de las personas o bienes que tengamos a nuestro
            cargo.
          </p>
        </section>
        <div class="limpiarfloat"></div>
      </div>

      <div class="bloque">
        <section class="parte">
          <h4 style="text-align: center">Nuestros Objetivos</h4>
          <hr style="border: 2px solid goldenrod" />
          <ol>
            <li>
              Obtener la total satisfacción y confianza de nuestros clientes.
            </li>
            <li>
              Promover una cultura de gestión del riesgo entre clientes,
              proveedores y trabajadores.
            </li>
            <li>
              Capacitar y adoptar medidas preventivas para evitar hechos que
              puedan afectar la seguridad de nuestros clientes, o reducir sus
              efectos negativos.
            </li>
          </ol>
        </section>
        <div class="parte">
          <img src="assets/img/equipo1.jpg" alt="Nuestro Equipo" />
        </div>
        <div class="limpiarfloat"></div>
      </div>
    </div>

      <div id="principal2">
        <div class="banner2">
          <div>
            <h2 style="text-align: center">¿Nuestro Deber?</h2>
            <br>
            <p style="text-align: center">
              CUSTODIA, PROTECCIÓN Y SEGURIDAD.
              <br> "Siempre Vigilante"
              
            </p>
          </div>
        </div>
      </div>
<?php require_once FOOTER; ?>
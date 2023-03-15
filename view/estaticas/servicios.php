<?php
require_once HEADER; ?>
<style>
      /*configurando el body*/
      h2 {
        text-align: center;
        color: #fff;
        padding: 25px;
      }

      #contenedorPrincipal {
        margin: auto;
      }

      #TodaInfo {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        color: #ffffff;
      }

      .Beneficio {
        box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.603);
        margin: 20px;
        background: #191c36;
        border-radius: 10px;
        text-align: center;
        width: 25%;
      }

      .Beneficio h3 {
        font-size: 30px;
        padding: 20px;
      }

      .Beneficio p {
        color: #fff;
        padding: 20px;
        font-size: 20px;
      }

      /*configurando el footer*/

      .boton {
        padding: 10px;
        font-size: 20px;
        border-radius: 1000px;
        background: goldenrod;
        color: #fff;
        margin: 20px;
      }

      .botonFS {
        margin-block: 5%;
        margin-inline-start: 40%;
        padding: 2.5rem 7rem;
        background: #404346;
        border: 0.1rem solid #1f2224;
        cursor: pointer;
        position: relative;
        border-radius: 0.3rem;
        overflow: hidden;
      }

      .botonFS::before {
        content: "Elija su servicio aquí";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.6rem;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        font-weight: 700;
        text-shadow: 0.1rem 0.1rem 0.1rem #333;
        transition: 0.2s ease;
      }

      .botonFS::after {
        content: "ir!";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-58%, -50%) scale(0);
        font-size: 1.6rem;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        font-weight: 700;
        text-shadow: 0.1rem 0.1rem 0.1rem #333;
        transition: 0.25s ease;
        opacity: 0;
      }

      .botonFS:hover::before {
        transform: translate(-50%, -58%) scale(3);
        opacity: 0;
      }

      .botonFS:hover::after {
        transform: translate(-50%, -58%) scale(1);
        opacity: 1;
      }
    </style>
<div id="contenedorPrincipal">
      <div id="TodaInfo">
        <div class="Beneficio">
          <h3>Servicio de guardianía armada a nivel nacional</h3>
          <img
            src="assets/img/ServicioGuardiania.png"
            width="100"
            height="100"
            alt="servicio"
          />
          <p>
            Brindamos Servicio de Guardia Armada y Vigilancia 24 horas 365 días
            del año...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Seguridad Electrónica</h3>
          <img
            src="assets/img/SeguridadElectronica.png"
            width="120"
            height="120"
            alt="servicio"
          />
          <p>
            Brindamos los mejores productos y servicios, con tecnología de
            punta...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Seguridad VIP</h3>
          <img
            src="assets/img/SeguridadVip.png"
            width="120"
            height="120"
            alt="servicio"
          />
          <p>
            Nuestro servicio de VIP, cuenta con personal entrenado y
            capacitado...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Investigaciones</h3>
          <img
            src="assets/img/Investigaciones.png"
            width="120"
            height="120"
            alt="servicio"
          />
          <p>
            Líderes, utilizando los medios, materiales y técnicas más
            avanzadas...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Transporte de Valores</h3>
          <img
            src="assets/img/TransporteValores.png"
            width="120"
            height="120"
            alt="servicio"
          />
          <p>
            Servicio vehicular con total seguridad en el transporte de efectivo,
            etc...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Cursos de Seguridad</h3>
          <img
            src="assets/img/CursoSeguridad.png"
            width="120"
            height="120"
            alt="servicio"
          />
          <p>
            Aprende sobre tácticas operacionales y obtén formación
            humanística...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Planes de gestión de seguridad</h3>
          <img
            src="assets/img/PlanesGestionSeguridad.png"
            width="120"
            height="120"
            alt="servicio"
          />
          <p>
            Realizamos estudios y planes de gestión de seguridad, para
            Empresas...
          </p>
        </div>
        <div class="Beneficio">
          <h3>Diseño de sistemas de seguridad</h3>
          <img
            src="assets/img/DiseñoSistemaSeguridad.png"
            width="120"
            height="150"
            alt="servicio"
          />
          <p>
            Diseñamos sistemas de seguridad físico y electrónico, para
            Petroleras...
          </p>
        </div>
      </div>
    </div>
    
        <button class="botonFS" onclick="location.href='index.php?c=servicio&f=view_new'"></button>
<?php
require_once FOOTER; ?>
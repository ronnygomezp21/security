<?php
require_once HEADER; ?>
<style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        color: #fff;
      background-image: url(assets/img/caro6.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    
      }

      .titulo {
        font-size: 50px;
        text-align: center;
        margin-top: 80px;
        margin-bottom: 40px;
        text-decoration: underline 4px;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
      }

      .pregunta {
        border-bottom: 1px solid #fff;
      }
      .pregunta button {
        width: 100%;
        background-color: #0b1936c0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 15px;
        border: none;
        outline: none;
        font-size: 22px;
        color: #fff;
        font-weight: 700;
        cursor: pointer;
      }
      .pregunta p {
        font-size: 22px;
        max-height: 0;
        opacity: 0;
        line-height: 1.5;
        overflow: hidden;
        transition: all 0.6s ease;
      }
      .d-arrow {
        transition: transform 0.5s ease-in;
        color: #fff;
      }

      .pregunta p.show {
        max-height: 200px;
        opacity: 1;
        padding: 0px 15px 30px 15px;
        background-color: rgba(18, 10, 95, 0.034);
      }
      .pregunta button .d-arrow.rotate {
        transform: rotate(180deg);
      }

      .comentarios {
        padding: 0cm;
        margin: 0;
      }

      .caja {
        margin: 20px auto;
        width: 500px;
      }

      .caja h2, h3 {
        font-size: 30px;
        margin-bottom: 15px;
        text-align: center;
      }

      .caja input {
        width: 100%;
        height: 50px;
        padding: 0 20px;
        margin-bottom: 15px;
        border-radius: 8px;
        border: 1px solid #a5a5a5;
      }

      .caja input:focus {
        border: 1px solid #000000;
        outline: 0;
      }

      .caja textarea {
        width: 100%;
        height: 150px;
        padding: 15px 20px;
        margin-bottom: 10px;
        border-radius: 8px;
        border: 1px solid #a5a5a5;
      }

      .caja textarea:focus {
        border: 1px solid #000000;
        outline: 0;
      }

      .caja button {
        border: 0;
        padding: 10px 30px;
        background: #ffffff;
        font-size: 15px;
        border-radius: 6px;
        color: #ffffff;
        background-color: #050722;
      }

      .caja button:hover {
        background-color: rgb(173, 173, 173);
        color: black;
      }
    </style>
     <section>
      <h1 class="titulo">Preguntas Frecuentes</h1>

      <div class="container">
        <div class="pregunta">
          <button class="btn-drop">
            <span>¿Cuánto tiempo han estado en el negocio?</span>
            <i class="fas fa-chevron-down d-arrow"></i>
          </button>
          <p>
            La longevidad es excelente para la tranquilidad,
             saber que la empresa ha existido durante 25 años habla de su estabilidad y confiabilidad.
             Con esa longevidad viene la experiencia clave con industrias específicas 
             y los desafíos de seguridad asociados dentro de esa industria.
          </p>
        </div>

        <div class="pregunta">
          <button class="btn-drop">
            <span>¿Qué tipo de formación reciben sus guardias de seguridad?</span>
            <i class="fas fa-chevron-down d-arrow"></i>
          </button>
          <p>
            Nuestro programa de capacitación consiste en capacitación en el aula que cubre
             las leyes estatales y los procedimientos generales de seguridad. Además, todo 
             el personal de seguridad recibe formación in situ específica para cada cliente en particular.
          </p>
        </div>

        <div class="pregunta">
          <button class="btn-drop">
            <span>¿Cuentan con protección a robo de datos?</span>
            <i class="fas fa-chevron-down d-arrow"></i>
          </button>
          <p>
            Por supuesto, en conjunto con la seguridad electrónica implementamos 
            tecnología de punta para evitar cualquier robo infórmatico.
          </p>
        </div>

        <div class="pregunta">
          <button class="btn-drop">
            <span>¿Sus cursos tienen certificados?</span>
            <i class="fas fa-chevron-down d-arrow"></i>
          </button>
          <p>
            La respuesta es sí, todos nuestro cursos están avalados por certificados internacionales como la
            NORMA ISO 9001, dicho certificado te brindaría una ventaja en el campo laboral.
          </p>
        </div>
      </div>
    </section>

    <div class="comentarios">
      <div class="caja">
        <h2>¿Tiene alguna duda o sugerencia?</h2>
        <h3>Envíe sus comentarios</h3>
        <form id="miFormulario">
          <input
            type="text"
            name="nombre"
            id="nombre"
            placeholder="Ingrese sus nombres"
          />
          <input
            type="text"
            name="email"
            id="email"
            placeholder="Ingrese su correo electrónico"
          />
          <textarea
            name="comentarios"
            id="cajacomentario"
            placeholder="Escriba sus dudas o comentarios"
          ></textarea>
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>

    <script>
      const miFormulario = document.querySelector("#miFormulario");
      miFormulario.addEventListener("submit", validar);

      // Parte del dropper question
      const buttons = document.querySelectorAll(".btn-drop");

      buttons.forEach((button) => {
        button.addEventListener("click", () => {
          const faq = button.nextElementSibling;
          const icon = button.children[1];

          faq.classList.toggle("show");
          icon.classList.toggle("rotate");
        });
      });

      function validar(event) {
        event.preventDefault();
        let valido = true;
        // Expresion regular
        var emailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gi;
        var soloText = /^[a-zÀ-ú ]*$/i;

        const nombre = document.getElementById("nombre").value;
        const email = document.getElementById("email").value;
        const comentarios = document.getElementById("cajacomentario").value;

        if (nombre === "") {
          alert("El nombre es requerido");
          valido = false;
        } else if (!soloText.test(nombre)) {
          alert("El nombre solo debe llevar letras");
          valido = false;
        }

        if (email === "") {
          alert("El email es requerido");
          valido = false;
        } else if (!emailValid.test(email)) {
          alert("El email no tiene el formato correcto");
          valido = false;
        }

        if (comentarios === "") {
          alert("El comentario es requerido");
          valido = false;
        } else if (comentarios.length < 50) {
          alert("el comentarios debe ser minímo de 50 caracteres");
          valido = false;
        }

        if (valido) {
          this.submit();
        }
      }
    </script>


<?php
require_once FOOTER; ?>
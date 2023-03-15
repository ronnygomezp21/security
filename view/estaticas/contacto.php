<?php
require_once HEADER;?>
<style>


  .contenedorContacto{
      padding: 50px;
      height: auto;
      margin: 5px;
  }

  .contenido{
      margin: 20px;
  }

  .tituloC{
      background-color:  #444444;
      border: 2px solid black;
      padding: 5px;
      margin: 10px;
      text-align: center;
  }

  .slider{
  background-color: #ffffff;
  border:1px solid  black;
  margin: 60px;
  position: relative;
  overflow: hidden;
  padding: 30px;
  }

  .slider .left-slide,.slider .right-slide{
  position: absolute;
  height: 40px;
  width: 40px;
  background-color: #444444;
  border-radius: 50%;
  color:#ffffff;
  font-size: 20px;
  top:50%;
  cursor: pointer;
  margin-top: -20px;
  text-align: center;
  line-height: 40px;

  }
  .slider .left-slide:hover,.slider .right-slide:hover{
  box-shadow: 0px 0px 10px black;
  background-color: red;
  }

  .slider .left-slide{
  left: 30px;
  }
  .slider .right-slide{
  right: 30px;
  }
  .slider .slider-items .item iframe{
  width: 100%;
  display: block;
  animation:zoom 1s ease;
  }

  @keyframes zoom{
  0%{transform: scale(2);opacity: 0}
  50%{transform: scale(2);}
  100%{transform: scale(1);opacity:1}
  }
  .slider .slider-items .item{
  display: none;
  position: relative;
  }
  .slider .slider-items .item .caption{
  position: absolute;
  width: 100%;
  height: 60px;
  bottom: 0px;
  left: 0px;
  background-color: rgba(0,0,0,.5);
  line-height: 60px;
  text-align: center;
  color: #ffffff;
  font-size: 30px;

  }

  .slider .slider-items .item.active{
  display: block;
  }




  .enlaceformulario{
      text-align: center;
      padding: 8px;
  }

  .enlaceformulario a{
      border : 2px  solid black;
      border-radius: 1px;
      text-decoration: none;
      padding: 5px;
      background-color: black;
      color: whitesmoke;
      font-size: 200%;

  }


  .enlaceformulario a:hover{
      background-color: rgba(18, 161, 228, 0.623);
      color: whitesmoke;

  }

  .ubicaciones{

      background-color: rgb(230, 230, 230);
      width: 100%;
      height: 500%;
  }

  #ubi {
  padding: 5px ;
  margin: 40px;
  }

  .enlaceformulario{
      display: grid;
      grid-template-columns: repeat(3,1fr);

  }

  .enlaceformulario h2{
      grid-column-start: 1;
      grid-column-end: 4;
  }
      </style>
       <h1 class="tituloC" style="color: whitesmoke"> CONTACTO </h1>

    <div class="contenedorContacto">

        <div class="contenido ubicaciones">

            <div class="parte subtitulo">
                <h2> NUESTRAS OFICINAS</h2>
            </div>

            <div class="ubi" id="ubi">
                <form  method="post" id="ubiC" class="ubiC">


            <select style="padding:10px ;" name="ciudad" id="ciudad" class="formItem">
                <option value="0"> Seleccione...</option>
                <option value="1">Guayaquil</option>
                <option value="2">Durán</option>
                <option value="3">Manta</option>
                <option value="4">Portoviejo</option>
            </select>


            <input style="padding:10px"  type="submit"  class="btn btn-primary" value="Buscar" name="enviar">
                </form>
            </div>

        </div>


        <div class="slider">
            <div class="slider-items">
                <div  class="item active">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1021017.0434311532!2d-80.88729694114491!3d-1.5556292596898738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902be6b64b1bf4eb%3A0xcf2cd79b96de4b5d!2sHOSTAL%20MALEC%C3%93N%20BLUE!5e0!3m2!1ses!2sec!4v1658260947574!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   <div class="caption">
                      Guayaquil
                   </div>
                </div>
                <div  class="item">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.963117868972!2d-79.8481115!3d-2.1677312000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6c6b0d87ac5f%3A0x86fa575010c3dede!2zSG90ZWwgTGEgUsOtYSBEdXLDoW4!5e0!3m2!1ses-419!2sec!4v1658261569163!5m2!1ses-419!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   <div class="caption">
                      Durán
                   </div>
                </div>
                <div  class="item">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.911959358878!2d-80.02281528473051!3d-2.1870676378901743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d93a864edab%3A0x58bc4b30a6261121!2sSEGONZA%20CIA.%20LTDA.!5e0!3m2!1ses!2sec!4v1658261671719!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   <div class="caption">
                      Manta
                   </div>
                </div>
                <div  class="item">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.141711276678!2d-80.45390498473576!3d-1.0552032357166308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902b8d4dae5d8a0b%3A0xcffca5dd0f002941!2sHotel%20Gran%20Senador!5e0!3m2!1ses-419!2sec!4v1658261653000!5m2!1ses-419!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="caption">
                       Portoviejo
                    </div>
                 </div>

            </div>
              <!-- slider controls -->
                <div class="left-slide"> *_* </div>
                <div class="right-slide"> *_* </div>
              <!-- slider controls -->
         </div>

        <div style="background-color: whitesmoke" class="contenido enlaceformulario">
            <h2 style="text-align: start" > NOSOTROS SOMOS SEGURIDAD</h2>
            <div style="align-items: center " class="parrafo-img">
            <img src="assets/img/segurity2.jpeg" width="450" alt="security">
            </div>
            <div style="text-align: justify ; padding: 10px" class="parrafo-texto">
            <p> Empresa que brinda servicios de seguridad física, con un equipo humano calificado y experimentado. Mantiene un Sistema de Gestión Integrado ISO 9001:2015 y BASC que le permite satisfacer los requerimientos de seguridad del cliente, evitar que se cometan actos ilícitos en la prestación de servicios de seguridad, tales como corrupción, soborno, narcotráfico, terrorismo, lavado de activos, conspiración interna, contrabando o robo, cumplir las expectativas de otras partes interesadas, alcanzar un crecimiento continuo de la organización y mejorar la calidad de vida de sus trabajadores. Adicionalmente busca la mejora continua de sus procesos y del sistema de gestión en general.</p>
            </div>
            <div style="border-left: 2px solid black" class="parrafo-link">
            <strong> PARA MAYOR INFORMACIÓN SUSCRIBIRSE INGRESANDO EN EL BOTON DE SUSCRIBIRSE ACONTINUACIÓN  </strong> <br>
            <strong> ---------------------------------------------------------------------------------------  </strong> <br>
            <strong> ---------------------------------------------------------------------------------------  </strong> <br>
            <strong> ||  </strong><br> <br>
            <a  href="index.php?c=contacto&f=view_new"> ||SUSCRIBIRSE AQUÍ|| </a>
            </div>
        </div>


    </div>


	<script>

        var ubi_contactactenos = document.querySelector("#ubi");
        ubi_contactactenos.addEventListener("submit", validarCampos);

        function validarCampos(event) {
        var resultado = true;
        var selectCiudad = document.getElementById("ciudad");

        limpiarMensajes();

        if (selectCiudad.value === null || selectCiudad.value === "0") {
        resultado = false;
        mensaje("Debe seleccionar Ciudad", selectCiudad);
        }else if(selectCiudad.value === "1"){
        resultado = false;
            mensaje("------------------------UBICACIÓN 1 ------------------------", selectCiudad)  ;
            mensaje("Dirección:Salinas Km 16.5, Mz 39, Solar 3, Puerto Hondo, Guayaquil 090511 ", selectCiudad);
            mensaje("Teléfono: 099 735 9761 - 042864561" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@guayaquil.ecua.net.ec" , selectCiudad)  ;
            mensaje("----", selectCiudad)  ;
            mensaje("------------------------UBICACIÓN 2 ------------------------", selectCiudad)  ;
            mensaje("Dirección:Salinas Km 16.5, Mz 39, Solar 3, Puerto Hondo, Guayaquil 090511 ", selectCiudad);
            mensaje("Teléfono: 099 735 9761 - 042864561" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@guayaquil.ecua.net.ec" , selectCiudad)  ;
        }else if(selectCiudad.value === "2"){
        resultado = false;
            mensaje("------------------------UBICACIÓN 1------------------------", selectCiudad)  ;
            mensaje("Dirección: Abel Gilbert 114, Cdla. Ferroviaria 1, Durán 090701 ", selectCiudad);
            mensaje("Teléfono: 0986355699 - 042624513" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@duran.ecua.net.ec" , selectCiudad)  ;
            mensaje("----", selectCiudad)  ;
            mensaje("------------------------UBICACIÓN 2------------------------", selectCiudad)  ;
            mensaje("Dirección: Abel Gilbert 114, Cdla. Ferroviaria 1, Durán 090701 ", selectCiudad);
            mensaje("Teléfono: 0986355699 - 042624513" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@duran.ecua.net.ec" , selectCiudad)  ;
        }else if(selectCiudad.value === "3"){
        resultado = false;
            mensaje("------------------------UBICACIÓN 1------------------------", selectCiudad)  ;
            mensaje("Dirección: Malecón de Tarqui calle 109, frente al mar, al pie de la nueva vía Puerto-Aeropuerto. ", selectCiudad);
            mensaje("Teléfono: 052627926 - 052622813" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@manta.ecua.net.ec" , selectCiudad)  ;
            mensaje("----", selectCiudad)  ;
            mensaje("------------------------UBICACIÓN 2------------------------", selectCiudad)  ;
            mensaje("Dirección: Malecón de Tarqui calle 109, frente al mar, al pie de la nueva vía Puerto-Aeropuerto. ", selectCiudad);
            mensaje("Teléfono: 052627926 - 052622813" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@manta.ecua.net.ec" , selectCiudad)  ;
        }else if(selectCiudad.value === "4"){
        resultado = false;
            mensaje("------------------------UBICACIÓN 1------------------------", selectCiudad)  ;
            mensaje("Dirección:  Portoviejo; calle morales, y, Portoviejo 130105 ", selectCiudad);
            mensaje("Teléfono: 0962940219- 064512365" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@portoviejo.ecua.net.ec" , selectCiudad)  ;
            mensaje("----", selectCiudad)  ;
            mensaje("------------------------UBICACIÓN 1------------------------", selectCiudad)  ;
            mensaje("Dirección:  Portoviejo; calle morales, y, Portoviejo 130105 ", selectCiudad);
            mensaje("Teléfono: 0962940219- 064512365" , selectCiudad)  ;
            mensaje("e-mail: vtdelgad@portoviejo.ecua.net.ec" , selectCiudad)  ;

        }

        if (!resultado) {
        event.preventDefault();
        }
        }



        //fin de funcion validarCampos()
        function mensaje(cadenaMensaje, elemento) {
        elemento.focus();
        var nodoPadre = elemento.parentNode;
        var nodoMensaje = document.createElement("p");
        nodoMensaje.textContent = cadenaMensaje;
        nodoMensaje.style.color = "black";
        nodoMensaje.style.animationDirection = "alternate";

        nodoMensaje.style.fontWeight= "bolder";
        nodoMensaje.style.fontFamily="Verdana, Geneva, Tahoma, sans-serif";
        nodoMensaje.style.textAlign ="center";

        nodoMensaje.display = "block";
        nodoMensaje.setAttribute("class", "mensajeError");
        nodoPadre.appendChild(nodoMensaje);
        }

        function limpiarMensajes() {
        var mensajes = document.querySelectorAll(".mensajeError");
        for (let i = 0; i < mensajes.length; i++) {
        mensajes[i].remove();
        }
        }

        //slider
    var slides=document.querySelector('.slider-items').children;
    var nextSlide=document.querySelector(".right-slide");
    var prevSlide=document.querySelector(".left-slide");
    var totalSlides=slides.length;
    var index=0;

    nextSlide.onclick=function () {
    next("next");
    }
    prevSlide.onclick=function () {
    next("prev");
    }

    function next(direction){

    if(direction=="next"){
    index++;
    if(index==totalSlides){
    index=0;
    }
    }
    else{
    if(index==0){
    index=totalSlides-1;
    }
    else{
    index--;
    }
    }

    for(i=0;i<slides.length;i++){
    slides[i].classList.remove("active");
    }
    slides[index].classList.add("active");

    }

    </script>

<?php require_once FOOTER;?>
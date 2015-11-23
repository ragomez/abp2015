<!DOCTYPE html>
<?php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Registro");
$errors = $view->getVariable("errors");
?>


<style>
        .tabs {
            position: relative;
            min-height: 350px;
            clear: both;
            margin: 25px 0;
        }
        .tab {
            float: left;
        }
        .tab label {
            background: #eee;
            padding: 10px;
            border: 1px solid #ccc;
            margin-left: -1px;
            position: relative;
            left: 1px;
        }
        /*oculto los inputs para que solo se vean las etiquetas o label*/
        .tab input[type=radio] {
            display: none;
        }
        .content {
            position: absolute;
            top: 28px;
            left: 0;
            background: white;
            right: 0;
            bottom: 0;
            padding: 20px;
            border: 1px solid #ccc;
            overflow: hidden;
            text-align: justify;
        }
        .content >
         * {
            display:none;

        }
        .tab input[type=radio]:checked ~ label {
            background: white;
            border-bottom: 1px solid white;
            z-index: 2;
        }
        .tab input[type=radio]:checked ~ label ~ .content {
            z-index: 1;
        }
        .tab input[type=radio]:checked ~ label ~ .content >
         * {
            display: block;
        }
        img{
            margin:5px 10px 0 5px;
            float:left;
        }
       
        
    </style>
  <body>

      

      <div class="tabs">
    <!--pesta–a 1 activa por defecto-->
    <div class="tab">
        <input type="radio" id="tab-1" name="tab-group-1" checked>
        <label for="tab-1">Tab 1</label>
        <!--contenido de la pesta–a 1-->
        <div class="content">
            <div class="container">
            <h2>Formulario de registro de usuario</h2>
          
            <div >
              <form class="form-registro" method="POST" action="index.php?controller=users&action=register">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre usuario" name="login">
                    <?= isset($errors["login"])?$errors["login"]:"" ?><br>
                  </div>

                   <div class="form-group">
                        <input type="text" class="form-control" placeholder="nombre" name="name">
                        <?= isset($errors["name"])?$errors["name"]:"" ?><br>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="apellidos" name="apellidos">
                      <?= isset($errors["apellidos"])?$errors["apellidos"]:"" ?><br>
                  </div>

                   <div class="form-group">
                      <input type="text" class="form-control" placeholder="email" name="mail">
                      <?= isset($errors["mail"])?$errors["mail"]:"" ?><br>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="dni" name="dni">
                      <?= isset($errors["dni"])?$errors["dni"]:"" ?><br>
                  </div>


                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="telefono" name="telefono">
                      <?= isset($errors["telefono"])?$errors["telefono"]:"" ?><br>
                  </div>

                  <div class="form-group">        
                      <input type="password" class="form-control" placeholder="contraseña" name="passwd">
                      <?= isset($errors["passwd"])?$errors["passwd"]:"" ?><br>
                  </div>

                  <div>                         
                      <input type="hidden" name="tipo" value="Jurado popular">                      
                  </div>

                  <p></p>

                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Registrarse">
                  </div>
              </form>          
            </div>
        </div>
    </div>
    <!-- pesta–a 2-->
    <div class="tab">
        <input type="radio" id="tab-2" name="tab-group-1">
        <label for="tab-2">Tab 2</label>
        <div class="content">
              <!--contenido de la pesta–a 2-->
          <section class="contact" id="contact">

            <div class="container w960">
              <div class="row">                             
                <h2>Formulario de registro de establecimiento</h2>               
                <form method="post" action="index.php?controller=users&action=register" >
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre usuario" name="login">
                    <?= isset($errors["login"])?$errors["login"]:"" ?><br>
                  </div>
                  <div class="form-group">
                    <input name="nombreEstablecimiento" class="contact col-md-6" placeholder="Nombre establecimiento" type="text">
                  </div>
                  <div class="form-group">
                    <input name="cif" class="contact col-md-6" placeholder="cif" type="text">
                  </div>
                  <div class="form-group">
                    <input name="direccion" class="contact col-md-6" placeholder="Direccion" type="text">
                  </div>
                  <div class="form-group">
                    <input name="horario" class="contact noMarr col-md-6" placeholder="Horario" type="text">
                  </div>
                  <div class="form-group">
                     <input name="paginaWeb" class="contact noMarr col-md-6" placeholder="Pagina web" type="text">
                  </div>
                  <div class="form-group">
                    <input name="telefono" class="contact noMarr col-md-6" placeholder="Telefono" type="text">
                  </div>
                  <div class="form-group">
                    <input name="tipo" type="hidden" value="Establecimiento">
                  </div>
                  <div class="form-group">        
                      <input type="password" class="form-control" placeholder="contraseña" name="passwd">
                      <?= isset($errors["passwd"])?$errors["passwd"]:"" ?><br>
                  </div>
                  <div class="form-group">
                    <input id="submit" class="contact submit" value="Registrarse" type="submit">
                  </div>
                </form>
              </div >
              </div>
            </div>
          </section>
            

        </div>
    </div>


   </body>
</html>
<!-- @ CSSTabs
     @ author Agust’n Baraza (contacto@nosolocss.com)
     @ Copyright 2014 nosolocss.com. All rights reserved
     @ http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
     @ link http://www.nosolocss.com -->







<?php

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Registro");
$errors = $view->getVariable("errors");
?>

<LINK REL=StyleSheet HREF="css/pestanhasCss.css" TYPE="text/css" MEDIA=screen>
  




  <br><br>
  <div class="tabs">
    <!--pesta–a 1 activa por defecto-->
    <div class="tab">
        <input type="radio" id="tab-1" name="tab-group-1" checked>
        <label for="tab-1">Usario</label>
        <!--contenido de la pesta–a 1-->
        <div class="content">
            <section class="contact" id="contact">
            <div class="container w960">
            <div class="row"> 
            <h2>Formulario de registro de usuario</h2>         
            
              <form class="form-registro" method="POST" action="index.php?controller=users&action=register">

                  <div class="form-group">
                    <input type="text"class="contact col-md-5" placeholder="Nombre usuario" name="login">
                    <?= isset($errors["login"])?$errors["login"]:"" ?>
                  </div>

                   <div class="form-group">
                        <input type="text" class="contact col-md-5" placeholder="nombre" name="name">
                        <?= isset($errors["name"])?$errors["name"]:"" ?>
                  </div>

                  <div class="form-group">
                      <input type="text" class="contact col-md-5" placeholder="apellidos" name="apellidos">
                      <?= isset($errors["apellidos"])?$errors["apellidos"]:"" ?>
                  </div>

                   <div class="form-group">
                      <input type="text" class="contact col-md-5" placeholder="email" name="mail">
                      <?= isset($errors["mail"])?$errors["mail"]:"" ?>
                  </div>

                  <div class="form-group">
                      <input type="text" class="contact col-md-5" placeholder="dni" name="dni">
                      <?= isset($errors["dni"])?$errors["dni"]:"" ?>
                  </div>


                  <div class="form-group">
                      <input type="text" class="contact col-md-5" placeholder="telefono" name="telefono">
                      <?= isset($errors["telefono"])?$errors["telefono"]:"" ?>
                  </div>

                  <div class="form-group">        
                      <input type="password" class="contact col-md-5" placeholder="contraseña" name="passwd">
                      <?= isset($errors["passwd"])?$errors["passwd"]:"" ?>
                  </div>

                  <div >                         
                      <input type="hidden"  name="tipo" value="Jurado popular">                      
                  </div>                 
                 

                  <div class="form-group">
                      <input type="submit" class="contact submit" value="Registrarse">
                  </div>

              </form>          
            </div>
          </div>
       </section>
      </div>
    <!-- pesta–a 2-->
      <div class="tab">
          <input type="radio" id="tab-2" name="tab-group-1">
          <label for="tab-2">Establecimiento </label>
          <div class="content">
                <!--contenido de la pesta–a 2-->
            <section class="contact" id="contact">
              <div class="container w960">
                <div class="row">                             
                  <h2>Formulario de registro de establecimiento</h2>               
                  <form method="post" action="index.php?controller=users&action=register" >
                    
                    <div class="form-group">
                      <input type="text" class="contact col-md-5" placeholder="Login" name="login">
              
                    </div>

                    <div class="form-group">
                      <input name="nombreEstablecimiento" class="contact col-md-5" placeholder="Nombre establecimiento" type="text">
                    </div>

                    <div class="form-group">
                      <input name="cif" class="contact col-md-5" placeholder="cif" type="text">
                    </div>

                    <div class="form-group">
                      <input name="direccion" class="contact col-md-5" placeholder="Direccion" type="text">
                    </div>
                 
                    <div class="form-group">
                      <input name="horario" class="contact col-md-5" placeholder="Horario" type="text">
                    </div>

                    <div class="form-group">
                       <input name="paginaWeb" class="contact col-md-5" placeholder="Pagina web" type="text">
                    </div>

                    <div class="form-group">
                      <input name="telefono" class="contact col-md-5" placeholder="Telefono" type="text">
                    </div>

                    <div class="form-group">
                      <input name="tipo" type="hidden" value="Establecimiento">
                    </div>

                    <div class="form-group">        
                        <input type="password" class="contact col-md-5" placeholder="contraseña" name="passwd">
    
                    </div>

                    <div class="form-group">
                      <input id="submit" class="contact submit" value="Registrarse" type="submit">
                    </div>

                  </form>

                </div >
          
              </div>
            </section>
              

          </div>
      </div>
    </div>
</div>

</body>
</html>
<!-- @ CSSTabs
     @ author Agust’n Baraza (contacto@nosolocss.com)
     @ Copyright 2014 nosolocss.com. All rights reserved
     @ http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
     @ link http://www.nosolocss.com -->






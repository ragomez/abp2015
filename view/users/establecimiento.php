<!DOCTYPE html>
<?php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Registro");
$errors = $view->getVariable("errors");
?>
  <section class="contact" id="contact">

   <div class="container w960">
      <div class="row">
    <div class="done">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Tu mensaje ha sido enviado!.
      </div>
    </div>
       <form method="post" action="contact.php" id="contactform">
          Nombre establecimiento: <input name="nombreEstablecimiento" class="contact col-md-6" placeholder="Nombre establecimiento" type="text">
          CIF: <input name="cif" class="contact col-md-6" placeholder="cif" type="text">
          Direccion: <input name="direccion" class="contact col-md-6" placeholder="Direccion" type="text">
          Horario: <input name="horario" class="contact noMarr col-md-6" placeholder="Horario" type="text">
          Pagina web: <input name="paginaWeb" class="contact noMarr col-md-6" placeholder="Pagina web" type="text">
          Telefono: <input name="telefono" class="contact noMarr col-md-6" placeholder="Telefono" type="text">
         
          <input name="tipo" type="hidden" value="Establecimiento">
          <input id="submit" class="contact submit" value="Registrarse" type="submit">
        </form>
      </div>
    </div>
  </section>
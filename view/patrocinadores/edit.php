<?php 
 //file: view/posts/edit.php
 include ("includesCSS/includeCss.html");
 include ("view/users/menuSuperior.php");
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $patrocinador = $view->getVariable("patrocinador");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("patrocinador", "Edit Patrocinador");
 
?>
<div class="heading text-center">

            <h1><?= i18n("Modificar patrocinador") ?></h1>
            <form action="index.php?controller=Patrocinador&amp;action=edit" method="POST">
      

      
                  <?= i18n("Nombre Patrocinador") ?>: <input type="text" name="nombrePatrocinador" 
                  value="<?= isset($_POST["nombrePatrocinador"])?$_POST["nombrePatrocinador"]:$patrocinador->getNombrePatrocinador() ?>">
                  <?= isset($errors["nombrePatrocinador"])?$errors["nombrePatrocinador"]:"" ?><br>
      
                  <?= i18n("Importe ") ?>: <input type="text" name="importe" 
                  value="<?= isset($_POST["importe"])?$_POST["importe"]:$patrocinador->getImporte() ?>">
                  <?= isset($errors["importe"])?$errors["importe"]:"" ?><br>

                  <?= i18n("Numero de Telefono") ?>: <input type="text" name="telefonoPatrocinador"  
                  value="<?= isset($_POST["telefonoPatrocinador"])?$_POST["telefonoPatrocinador"]:$patrocinador->getTelefonoPatrocinador() ?>">
                  <?= isset($errors["telefonoPatrocinador"])?$errors["telefonoPatrocnador"]:"" ?><br>
                      
      
                  <input type="hidden" name="id" value="<?= $patrocinador->getIdPatrocinador() ?>">
                  <input type="submit" name="submit" value="<?= i18n("Modificar patrocinador") ?>">
            </form>
 </div>   
    
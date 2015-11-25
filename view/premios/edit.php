<?php 
 //file: view/posts/edit.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $premio = $view->getVariable("premio");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("premio", "Edit Premio");
 
?>
<h1><?= i18n("Modificar premio") ?></h1>
<form action="index.php?controller=premios&amp;action=edit" method="POST">
      
      <?= i18n("nombrePremio") ?>: <input type="text" name="nombrePremio" 
      value="<?= isset($_POST["nombrePremio"])?$_POST["nombrePremio"]:$premio->getNombrePremio() ?>">
      <?= isset($errors["nombrePremio"])?$errors["nombrePremio"]:"" ?><br>
      
      <?= i18n("ImportePopular") ?>: <input type="text" name="importePopular" 
      value="<?= isset($_POST["importePopular"])?$_POST["importePopular"]:$premio->getImportePopular() ?>">
      <?= isset($errors["importePopular"])?$errors["importePopular"]:"" ?><br>

      <?= i18n("importeProfesional") ?>: <input type="text" name="importeProfesional"  
      value"<?= isset($_POST["importeProfesional"])?$_POST["importeProfesional"]:$premio->getImporteProfesional() ?>">
      <?= isset($errors["importeProfesional"])?$errors["importeProfesional"]:"" ?><br>

      <?= i18n("FechaPremio") ?>: <input type="text" name="fechaPremio"  
      value"<?= isset($_POST["fechaPremio"])?$_POST["fechaPremio"]:$premio->getFechaPremio() ?>">
      <?= isset($errors["fechaPremio"])?$errors["fechaPremio"]:"" ?><br>

      <?= i18n("IdPatrocinador") ?>: <input type="text" name="patrocinador_idPatrocinador"  
      value"<?= isset($_POST["patrocinador_idPatrocinador"])?$_POST["patrocinador_idPatrocinador"]:$premio->getPatrocinador_idPatrocinador() ?>">
      <?= isset($errors["patrocinador_idPatrocinador"])?$errors["patrocinador_idPatrocinador"]:"" ?><br>
          
      
      <input type="hidden" name="id" value="<?= $premio->getNombrePremio() ?>">
      <input type="submit" name="submit" value="<?= i18n("Modificar premio") ?>">
</form>
    

<?php 
 //file: view/posts/edit.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $premio = $view->getVariable("premio");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("idPremio", "Edit Premio");
 
?>
<h1><?= i18n("Modify premio") ?></h1>
<form action="index.php?controller=premios&amp;action=edit" method="POST">
      
      <?= i18n("IdPremio") ?>: <input type="text" name="idPremio" 
      value="<?= isset($_POST["idPremio"])?$_POST["idPremio"]:$premio->getIdPremio() ?>">
      <?= isset($errors["idPremio"])?$errors["idPremio"]:"" ?><br>
      
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
          
      
      <input type="hidden" name="id" value="<?= $post->getId() ?>">
      <input type="submit" name="submit" value="<?= i18n("Modify post") ?>">
</form>
    

<?php 
 //file: view/posts/edit.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $folleto = $view->getVariable("folleto");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("idFolleto", "Edit Folleto");
 
?>
<h1><?= i18n("Modify folleto") ?></h1>
<form action="index.php?controller=Folleto&amp;action=edit" method="POST">
      
      
      <?= i18n("Titulo") ?>: <input type="text" name="titulo" 
      value="<?= isset($_POST["titulo"])?$_POST["titulo"]:$folleto->getTitulo() ?>">
      <?= isset($errors["titulo"])?$errors["titulo"]:"" ?><br>

      <?= i18n("descripcion") ?>: <input type="text" name="descripcion"  
      value"<?= isset($_POST["descripcion"])?$_POST["descripcion"]:$folleto->getDescripcion() ?>">
      <?= isset($errors["descripcion"])?$errors["descripcion"]:"" ?><br>

      <?= i18n("FechaInicio") ?>: <input type="text" name="fechaInicio"  
      value"<?= isset($_POST["fechaInicio"])?$_POST["fechaInicio"]:$folleto->getFechaInicio() ?>">
      <?= isset($errors["fechaInicio"])?$errors["fechaInicio"]:"" ?><br>

      <?= i18n("FechaFin") ?>: <input type="text" name="fechaFin"  
      value"<?= isset($_POST["fechaFin"])?$_POST["fechaInicio"]:$folleto->getFechaFin() ?>">
      <?= isset($errors["fechaFin"])?$errors["fechaFin"]:"" ?><br>

      <?= i18n("IdAdministrador") ?>: <input type="text" name="administrador_idAdministrador"  
      value"<?= isset($_POST["administrador_idAdministrador"])?$_POST["administrador_idAdministrador"]:$folleto->getAdministrador_idAdministrador() ?>">
      <?= isset($errors["administrador_idAdministrador"])?$errors["administrador_idAdministrador"]:"" ?><br>
          
      <input type="hidden" name="id" value="<?= $folleto->getTitulo() ?>">
      <input type="submit" name="submit" value="<?= i18n("Modificar folleto") ?>">
</form>
    

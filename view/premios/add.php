<?php 
 //file: view/posts/add.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $premio = $view->getVariable("premio");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("premio", "view Premio");
 
?>
<h1>Añadir premio</h1>
      <form action="index.php?controller=premio&amp;action=add" method="POST">
	  	
	  	 Id Premio: <input type="text" name="nombrePremio"  value="<?= $premio->getNombrePremio() ?>">
	    <?= isset($errors["nombrePremio"])?$errors["nombrePremio"]:"" ?><br>
	    
	     Importe Popular: <input type="text" name="importePopular"  value="<?= $premio->getImportePopular() ?>">
	    <?= isset($errors["importePopular"])?$errors["importePopular"]:"" ?><br>

	     Importe Profesional: <input type="text" name="importeProfesional"  value="<?= $premio->getImporteProfesional() ?>">
	    <?= isset($errors["importeProfesional"])?$errors["importeProfesional"]:"" ?><br>

	     Fecha Premio: <input type="text" name="fechaPremio"  value="<?= $premio->getFechaPremio() ?>">
	    <?= isset($errors["fechaPremio"])?$errors["fechaPremio"]:"" ?><br>

	     Id Patrocinador: <input type="text" name="patrocinador_idPatrocinador"  value="<?= $premio->getPatrocinador_idPatrocinador() ?>">
	    <?= isset($errors["patrocinador_idPatrocinador"])?$errors["patrocinador_idPatrocinador"]:"" ?><br>
	    
	    <input type="submit" name="submit" value="submit">
      </form>

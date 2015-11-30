<?php 
 //file: view/posts/add.php
 include ("includesCSS/includeCss.html");
 require_once(__DIR__."/../../core/ViewManager.php");
 
 $view = ViewManager::getInstance();
 
 $premio = $view->getVariable("premio");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("premio", "view Premio");
 
?>

<section class="gallery                                                                                                                                                                              " id="gallery">
		<div class="container">
			<div class="heading text-center">
<h1>Añadir premio</h1>
      <form action="index.php?controller=premio&amp;action=add" method="POST">
	  	
	  	 Nombre Premio: <input type="text" name="nombrePremio">
	    <?= isset($errors["nombrePremio"])?$errors["nombrePremio"]:"" ?><br>
	    
	     Importe Popular: <input type="text" name="importePopular">
	    <?= isset($errors["importePopular"])?$errors["importePopular"]:"" ?><br>

	     Importe Profesional: <input type="text" name="importeProfesional">
	    <?= isset($errors["importeProfesional"])?$errors["importeProfesional"]:"" ?><br>

	     Fecha Premio(aaaa-mm-dd): <input type="text" name="fechaPremio">
	    <?= isset($errors["fechaPremio"])?$errors["fechaPremio"]:"" ?><br>

	     Id Patrocinador: <input type="text" name="patrocinador_idPatrocinador">
	    <?= isset($errors["patrocinador_idPatrocinador"])?$errors["patrocinador_idPatrocinador"]:"" ?><br>
	    
	    <input type="submit" name="submit" value="Guardar">
      </form>
</div>
</div>
</section>
</section>


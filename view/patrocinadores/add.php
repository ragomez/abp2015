<?php 
 //file: view/posts/add.php
 include ("includesCSS/includeCss.html");
 require_once(__DIR__."/../../core/ViewManager.php");
 
 $view = ViewManager::getInstance();
 
 $patrocinador = $view->getVariable("patrocinador");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("patrocinador", "view Patrocinador");
 
?>

<section class="gallery                                                                                                                                                                              " id="gallery">
		<div class="container">
			<div class="heading text-center">
<h1>Añadir Patrocinador</h1>
      <form action="index.php?controller=patrocinador&amp;action=add" method="POST">
	  	
	  	 Nombre Patrocinador: <input type="text" name="nombrePatrocinador">
	    <?= isset($errors["nombrePatrocinador"])?$errors["nombrePatrocinador"]:"" ?><br>
	    
	     Importe Aportado: <input type="text" name="importe">
	    <?= isset($errors["importe"])?$errors["importe"]:"" ?><br>

	     Telefono: <input type="text" name="telefonoPatrocinador">
	    <?= isset($errors["telefonoPatrocinador"])?$errors["telefonoPatrocinador"]:"" ?><br>

	     
	    <input type="submit" name="submit" value="Guardar">
      </form>
</div>
</div>
</section>
</section>


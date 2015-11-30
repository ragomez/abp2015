<?php 
 //file: view/viewFolleto/add.php

 include ("includesCSS/includeCss.html");

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $folleto = $view->getVariable("folleto");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("folleto", "view Folleto");


?>
<section class="gallery" id="gallery">
		<div class="container">
			<div class="heading text-center">
				
			<h1>Generar folleto</h1>
      <form action="index.php?controller=Folleto&amp;action=formularioAdd" method="POST">
	  	

	  	 Titulo: <input type="text"  placeholder="Titulo del folleto"  name="titulo">
	   <br>
	    
	    Descripcion: <br>
	    <textarea name="descripcion" placeholder="Descripción del folleto" rows="4" cols="50"></textarea> 
	    <?= isset($errors["descripcion"])?$errors["descripcion"]:"" ?><br>

		Fecha inicio: <input type="text" placeholder="Fecha de inicio del folleto"   name="fechaInicio">
	   <br>

	   Fecha fin: <input type="text"  placeholder="Fecha final del folleto"  name="fechaFin">
	   <br>
	   <br>
	    <input type="submit" name="submit" value="submit">
      </form>
	</div>
	</div>
</section>

<?php 
	include ("includesCSS/includeJavascript.html");
?>
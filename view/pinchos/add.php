<?php 
 //file: view/posts/add.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $pincho = $view->getVariable("pincho");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("pincho", "view Pincho");
 
?><h1>añadir pincho</h1>
      <form action="index.php?controller=pincho&amp;action=add" method="POST">
	  	
	  	 Nombre: <input type="text" name="nombrePincho"  value="<?= $pincho->getNombrePincho() ?>">
	    <?= isset($errors["nombrePincho"])?$errors["nombrePincho"]:"" ?><br>
	    
	    Descripcion: <br>
	    <textarea name="descripcion" rows="4" cols="50"><?=    $pincho->getDescripcionPincho() ?></textarea>
	    <?= isset($errors["descripcion"])?$errors["descripcion"]:"" ?><br>

	    precio: <input type="text" name="precio"  value="<?= $pincho->getPrecio() ?>">
	    <?= isset($errors["precio"])?$errors["precio"]:"" ?><br>

	    celiaco: <input type="text" name="celiaco"  value="<?= $pincho->getCeliaco() ?>">
	    <?= isset($errors["celiaco"])?$errors["celiaco"]:"" ?><br>
	    
	    <input type="submit" name="submit" value="submit">
      </form>

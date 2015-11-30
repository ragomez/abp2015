<?php 
 //file: view/posts/view.php
 
 include ("includesCSS/includeCss.html");
 require_once(__DIR__."/../../core/ViewManager.php");
 
 $view = ViewManager::getInstance();

 //$premio = $view->getVariable("premio");
 $premio = $view-> 
 $currentuser = $view->getVariable("currentusername"); 

 
 $view->setVariable("nombre", "View Premio");
 
<<<<<<< HEAD
?>
  <h1><?= $premio->getNombrePremio()?></h1>
=======
?><h1><?= "Premio"/*$premio->getNombrePremio()*/ ?></h1>
>>>>>>> 6300cbda84fe3ed24e7d88ae5ffaee530f709942
   
    <p> 
    	Importe Popular 	  	:<?= $premio->getImportePopular() ?>
       <BR>
      Importe Profesional 	:<?= $premio->getImporteProfesional() ?>
       <BR>
   	<!-- 	Fecha Premio    			:<?= $premio->getFechaPremio() ?>
       <BR>
     <!-- Id Patrocinador    		:<?= $premio->getPatrocinador_idPatrocinador() ?>
       <BR>
     --> 
    </p>


   

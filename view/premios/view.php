<?php 
 //file: view/posts/view.php
 
 // include ("includesCSS/includeCss.html");
 require_once(__DIR__."/../../core/ViewManager.php");
 
 $view = ViewManager::getInstance();
 $premio = $view->getVariable("premio");
 $currentuser = $view->getVariable("currentusername"); 

 $view->setVariable("nombre", "View Premio");
?>
  <h1><?= $premio->getNombrePremio() ?></h1>

   
    <p> 
    	Importe Popular 	  	:<?= $premio->getImportePopular() ?>
       <BR>
      Importe Profesional 	:<?= $premio->getImporteProfesional() ?>
       <BR>
   	 	Fecha Premio    			:<?= $premio->getFechaPremio() ?>
       <BR>
     <!-- Id Patrocinador    		:<?= $premio->getPatrocinador_idPatrocinador() ?>
       <BR>
     --> 
    </p>


   

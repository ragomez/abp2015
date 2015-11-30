<?php 
 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $fol = $view->getVariable("fol");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("folleto", "view Folleto");

   include("view/users/menuSuperior.php");
?>


<h1>Ver folleto</h1>
      <form action="index.php?controller=Folleto&amp;action=view" method="POST">
    <p>
        Descripcion 	      : <?= $fol->getDescripcion(); ?>
       <BR>
   		  Fecha Inicio 			  : <?= $fol->getFechaInicio(); ?>
       <BR>
        Fecha Fin           : <?= $fol->getFechaFin(); ?>
       <BR>
        Id Administrador 		: <?= $fol->getAdministrador_idAdministrador(); ?>
       <BR>
    </p>
   
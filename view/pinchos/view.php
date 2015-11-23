<?php 
 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $pincho = $view->getVariable("pincho");
 $currentuser = $view->getVariable("currentusername"); 

 
 $view->setVariable("nombre", "View Pincho");
 
?><h1><?= $pincho->getNombrePincho() ?></h1>
   
    <p>
   <?= $pincho->getDescripcionPincho() ?>
   <BR>

   precio : <?= $pincho->getPrecio() ?> euros
       </p>


   

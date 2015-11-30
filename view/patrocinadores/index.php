<?php 
 //file: view/posts/index.php
	include ("includesCSS/includeCss.html");
	require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $patrocinadores = $view->getVariable("patrocinador");
 $currentuser = $view->getVariable("currentusername");
 
 
?><h1>Patrocinadores</h1>

<table border="1">
    
    <?php foreach ($patrocinadores as $patrocinador): ?>
	    <tr>	    
	      <td>
		    <a href="index.php?controller=Patrocinador&amp;action=listar&amp;nombrePatrocinador=<?= $patrocinador->getNombrePatrocinador() ?>">
		    <?=$patrocinador->getNombrePatrocinador() ?></a>
	      </td>
	      <td>
	    
		<?= $patrocinador->getImporte() ?>
	      </td>
	       <td>
	    
		<?= $patrocinador->getTelefonoPatrocinador() ?>
	      </td>
	      <td>
		
		  &nbsp;
		  
		  <?php 
		  // 'Edit Button'
		  ?>		  
		  <a href="index.php?controller=Patrocinador&amp;action=edit&amp;id=<?= $patrocinador->getNombrePatrocinador() ?>">Editar</a>

	      </td>
	    </tr>    
    <?php endforeach; ?>
    
    </table> 
     

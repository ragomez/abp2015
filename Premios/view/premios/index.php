<?php 
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $premios = $view->getVariable("premio");
 $currentuser = $view->getVariable("currentusername");
 
 
?><h1>Premios</h1>

<table border="1">
    
    <?php foreach ($premios as $premio): ?>
	    <tr>	    
	      <td>
		    <a href="index.php?controller=premio&amp;action=view&amp;idPremio=<?= $premio->getIdPremio() ?>">
		    <?= $premio->getIdPremio() ?></a>
	      </td>
	      <td>
	    
		<?= $premio->getImportePopular() ?>
	      </td>
	       <td>
	    
		<?= $premio->getImporteProfesional() ?>
	      </td>
	      <td>
		
		<?= $premio->getFechaPremio() ?>
	      </td>
	      <td>  
		  
		  <?= $premio->getPatrocinador_idPatrocinador() ?>
	      </td>
	      <td>

		  &nbsp;
		  
		  <?php 
		  // 'Edit Button'
		  ?>		  
		  <a href="index.php?controller=premio&amp;action=edit&amp;id=<?= $premio->getIdPremio() ?>">Edit</a>

	      </td>
	    </tr>    
    <?php endforeach; ?>
    
    </table> 
     

<?php 
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $pinchos = $view->getVariable("pincho");
 $currentuser = $view->getVariable("currentusername");
 
 
?><h1>Pinchos</h1>

<table border="1">
    
    <?php foreach ($pinchos as $pincho): ?>
	    <tr>	    
	      <td>
		    <a href="index.php?controller=pincho&amp;action=view&amp;idPincho=<?= $pincho->getIdPincho() ?>"><?= $pincho->getNombrePincho() ?></a>
	      </td>
	      <td>
	    
		<?= $pincho->getDescripcionPincho() ?>
	      </td>
	       <td>
	    
		<?= $pincho->getPrecio() ?>
	      </td>
	      <td>
		
		  
		  
		  &nbsp;
		  
		  <?php 
		  // 'Edit Button'
		  ?>		  
		  <a href="index.php?controller=pincho&amp;action=edit&amp;id=<?= $pincho->getIdPincho() ?>">Edit</a>

	      </td>
	    </tr>    
    <?php endforeach; ?>
    
    </table> 
     

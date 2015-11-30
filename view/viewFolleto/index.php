<?php 
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $folletos = $view->getVariable("folleto");
 $currentuser = $view->getVariable("currentusername");
 
 
?><h1>Folletos</h1>

<table border="1">
    
    <?php foreach ($folletos as $folleto): ?>
	    <tr>	    
	      <td>
		    <a href="index.php?controller=folleto&amp;action=view&amp;idFolleto=<?= $folleto->getIdFolleto() ?>">
		    <?= $folleto->getIdFolleto() ?></a>
	      </td>
	      <td>
	    
		<?= $folleto->getTitulo() ?>
	      </td>
	       <td>
	    
		<?= $folleto->getDescripcion() ?>
	      </td>
	      <td>
		
		<?= $folleto->getFechaInicio() ?>
	      </td>
	      <td>  

	    <?= $folleto->getFechaInicio() ?>
	      </td>
	      <td> 
		  
		<?= $folleto->getAdministrador_idAdministrador() ?>
	      </td>
	      <td>

		  &nbsp;
		  
		  <?php 
		  // 'Edit Button'
		  ?>		  
		  <a href="index.php?controller=folleto&amp;action=edit&amp;id=<?= $folleto->getIdFolleto() ?>">Edit</a>

	      </td>
	    </tr>    
    <?php endforeach; ?>
    
    </table> 
     

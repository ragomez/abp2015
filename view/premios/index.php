<?php 
 //file: view/posts/index.php
	include ("includesCSS/includeCss.html");
	require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $premios = $view->getVariable("premios");
 $currentuser = $view->getVariable("currentusername");
 
 
?><h1>Premios</h1>

<table border="2">
    
    <?php foreach ($premios as $premio): ?>
	    <tr>	    
	      <td>
		    <a href="index.php?controller=Premio&amp;action=view&amp;nombrePremio=<?= $premio->getNombrePremio() ?>">
		    <?= $premio->getNombrePremio() ?></a>
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
		  <a href="index.php?controller=Premio&amp;action=edit&amp;nombrePremio=<?= $premio->getNombrePremio() ?>">Editar</a>
		  <?php 
		  // 'Supr Button'
		  ?>
		  <a href="index.php?controller=Premio&amp;action=delete&amp;nombrePremio=<?= $premio->getNombrePremio() ?>">Eliminar</a>
		  
	      </td>
	    </tr>    
    <?php endforeach; ?>
    
    </table> 
     

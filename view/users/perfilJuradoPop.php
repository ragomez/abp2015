
<?php 

include ("includesCSS/includeCss.html");

  require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $jurado = $view->getVariable("jurado");
 
?>


<section class="gallery" id="gallery">
		<div class="container">
			<div class="heading ">
				
				<h1><?=$jurado->getNombre();?></h1>
				<p>	<?=$jurado->getDni();?></p>
				<p>	<?=$jurado->getTelefono();?></p>
				<p>	<?=$jurado->getApellidos();?></p>
				<p> <?=$jurado->getMail();?></p>
				  			
			</div>
		</div>
	</section>

<?php 
	include ("includesCSS/includeJavascript.html");
?>
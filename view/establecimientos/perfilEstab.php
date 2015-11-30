
<?php 

include ("includesCSS/includeCss.html");

  require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $establecimiento = $view->getVariable("establecimiento");
 
?>




<section class="gallery" id="gallery">
		<div class="container">
			<div class="heading ">
				
				<h1><?=$establecimiento->getNombre();?></h1>
				<p>	<?=$establecimiento->getPaginaWeb();?></p>
					<p>	<?=$establecimiento->getTelefono();?></p>
					<p>	<?=$establecimiento->getDireccion();?></p>
					<p> <?=$establecimiento->getHorario();
					// añadir get id pincho dentro de un if ( en caso de q la ide del pincho >1)
					//abir un cuadradito de esos monos q se abren al clicar en pincho?¿
					?></p>
				  			
			</div>
		</div>
	</section>

<?php 
	include ("includesCSS/includeJavascript.html");
?>
<?php 

include ("includesCSS/includeCss.html");
require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $establecimientos = $view->getVariable("establecimientos");
 $currentuser = $view->getVariable("currentusername"); 
 $view->setVariable("nombre", "View Establecimientos");
 ?>



<section class="gallery" id="gallery">

		<div class="container">
			<div class="heading text-center">
				<img class="dividerline" src="archivos/sep.png" alt="">
				<h2>Establecimientos 2015</h2>
				<img class="dividerline" src="archivos/sep.png" alt="">
			</div>
			
			<div id="grid-gallery" class="grid-gallery">
					<section class="grid-wrap">
						<ul  class="grid">
						 <li class="grid-sizer "></li><!-- for Masonry column width -->	
	<!--inicio -->		<?php foreach ($establecimientos as $establecimiento) { ?>
							<li class=" col-md-3">
								<figure>                           
								<?php 
								 print_r($establecimiento);
								 die();	
								?>								
									<figcaption><h3><?= $establecimiento->getNombre() ?> </h3>
										<p>Nombre 		 		:<?= $establecimiento->getNombre() ?></p>
										<p>CIF 				    :<?= $establecimiento->getCif() ?></p>
										<p>Direccion			:<?= $establecimiento->getDireccion()?></p>
										<p>Telefono 			:<?= $establecimiento->getTelefono() ?></p>
										<p>Horario 				:<?= $establecimiento->getHorario() ?></p>
										<p>Pagina WEB 		    :<?= $establecimiento->getPaginaWeb() ?></p>
										<br/>	
									</figcaption>

								</figure>
							</li>
							
	<!--fin -->			<?php } ?>						
						</ul>
						
					</section><!-- // end small images -->
					
					
				</div><!-- // grid-gallery -->

			</div>
	</section>

<?php 
	include ("includesCSS/includeJavascript.html");
?>
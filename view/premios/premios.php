


<?php 

include ("includesCSS/includeCss.html");

 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $premios = $view->getVariable("premios");
 $currentuser = $view->getVariable("currentusername"); 

 
 $view->setVariable("nombre", "View Premio");
 
?>


<?php 
	include("view/users/menuSuperior.php");
?>


<section class="gallery" id="gallery">
		<div class="container">
			<div class="heading text-center">
				<img class="dividerline" src="archivos/sep.png" alt="">
				<h2>Events Gallery</h2>
				<img class="dividerline" src="archivos/sep.png" alt="">
			</div>
			
			<div id="grid-gallery" class="grid-gallery">

					<section class="grid-wrap">
						
						<ul  class="grid">
			
							
							<li class="grid-sizer "></li><!-- for Masonry column width -->	
							<?php foreach ($premios as $premio) { ?>
							<li class=" col-md-3">
								<figure>
																		
									<figcaption><h3><?= $premio->getNombrePremio() ?></h3>
										<p>Importe Popular 		:<?= $premio->getImportePopular() ?> euros </p>
										<p>Importe Profesional  :<?= $premio->getImporteProfesional() ?> euros </p>
										<p>Fecha 				:<?= $pincho->getFechaPremio() ?>  </p>
										<p>Id Patrocinador 		:<?= $pincho->getPatrocinador_idPatrocinador() ?>  </p>
									</figcaption>
									

								</figure>
							</li>
							<?php } ?>						
						</ul>

					</section><!-- // end small images -->
					
					
				</div><!-- // grid-gallery -->
			</div>
	</section>

<?php 
	include ("includesCSS/includeJavascript.html");
?>
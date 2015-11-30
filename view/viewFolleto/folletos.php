<?php 

include ("includesCSS/includeCss.html");

 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $folletos = $view->getVariable("folletos"); 

 
 $view->setVariable("titulo", "View Folleto");
 
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
							<?php foreach ($folletos as $folleto) { ?>
							<li class=" col-md-3">
								<figure>
																		
									<figcaption><h3><?= $folleto->getTitulo() ?></h3>
										<p>Titulo		 		:<?= $folleto->getTitulo() ?> </p>
										<p>Descripcion  		:<?= $folleto->getDescripcion() ?> </p>
										<p>Fecha Inicio 		:<?= $folleto->getFechaInicio() ?>  </p>
										<p>Fecha Fin 			:<?= $folleto->getFechaFin() ?>  </p>
										<p>Id Administrador		:<?= $folleto->getAdministrador_idAdministrador() ?>  </p>
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
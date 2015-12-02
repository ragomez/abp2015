<?php 

include ("includesCSS/includeCss.html");
require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $premios = $view->getVariable("premios");
 $currentuser = $view->getVariable("currentusername"); 
 $view->setVariable("nombre", "View Premio");
 ?>



<section class="gallery" id="gallery">

		<div class="container">
			<div class="heading text-center">
				<img class="dividerline" src="archivos/sep.png" alt="">
				<h2>Premios 2015</h2>
				<img class="dividerline" src="archivos/sep.png" alt="">
			</div>
			
			<div id="grid-gallery" class="grid-gallery">
					<section class="grid-wrap">
						<ul  class="grid">
						 <li class="grid-sizer "></li><!-- for Masonry column width -->	
	<!--inicio -->		<?php foreach ($premios as $premio) { ?>
							<li class=" col-md-3">
								<figure>                           
																
									<figcaption><h3><?= $premio->getNombrePremio() ?> </h3>
										<p>Importe Popular 		:<?= $premio->getImportePopular() ?> € </p>
										<p>Importe Profesional  :<?= $premio->getImporteProfesional() ?> € </p>
										<p>Fecha 				:<?= sprintf("%s ", $premio->getFechaPremio())?></p>
										<p>Id Patrocinador 		:<?= $premio->getPatrocinador_idPatrocinador() ?></p>
										<div style="float:left">
										  <?php 
		 									// 'Edit Button'
										  ?>		  
		  									<a href="index.php?controller=Premio&amp;action=edit&amp;nombrePremio=<?= $premio->getNombrePremio() ?>">Editar</a>
		  								</div>	
		  								<div style = "float:right">	
										  <?php 
										  // 'Supr Button'
										  ?>
										  <a href="index.php?controller=Premio&amp;action=delete&amp;nombrePremio=<?= $premio->getNombrePremio() ?>">Eliminar</a>
										  </div>
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
<div style = "float:right">	
<?php 
 // 'ADD Button'
 ?>
 <a href="index.php?controller=Premio&amp;action=add">Añadir Premio</a>
</div>
<?php 
	include ("includesCSS/includeJavascript.html");
?>
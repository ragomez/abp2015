


<?php 

include ("includesCSS/includeCss.html");

 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $pinchos = $view->getVariable("pinchos");
 $currentuser = $view->getVariable("currentusername"); 

 
 $view->setVariable("nombre", "View Pincho");
 
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
							<?php foreach ($pinchos as $pincho) { ?>
							<li class=" col-md-3">
								<figure>
									<img src=<?= $pincho->getImagen(); ?> alt="">
									
									<figcaption><h3><?= $pincho->getNombrePincho(); ?></h3>
										<p><?= $pincho->getDescripcionPincho(); ?> </p>
										<p>precio : <?= $pincho->getPrecio(); ?> euros </p>
										<form class="form-registro" method="POST" action="index.php?controller=Pincho&amp;action=validarPincho">
												<input type="hidden"   name="idPincho"  value=<?= sprintf("%s ", $pincho->getIdPincho()); ?> >
                      							<input type="submit" name= "submit" class="btn btn-primary" value="Validar">
                      					</form>
									</figcaption>
									

								</figure>
							</li>
							<?php } ?>	
							<li></a>					
						</ul>

					</section><!-- // end small images -->	
					
				</div><!-- // grid-gallery -->
			</div>
	</section>

<?php 
	
?>



<?php 

include ("includesCSS/includeCss.html");

 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

$pincho1= $view->getVariable("pincho1");
$pincho2 = $view->getVariable("pincho2");
$pincho3 = $view->getVariable("pincho3");

$view->setVariable("title", "Validar");
/*<?= sprintf("%s ", $pincho2->getNombrePincho()); ?>*/
 
?>




<section class="gallery" id="gallery">
		<div class="container">
			<div class="heading text-center">
				<img class="dividerline" src="archivos/sep.png" alt="">
				<h2>Events Gallery</h2>
				<img class="dividerline" src="archivos/sep.png" alt="">
			</div>
		 	<h4>Vota solo un pincho.</h4>
			<div id="grid-gallery" class="grid-gallery">
				
		        <p></p>
		        <section class="grid-wrap">						
						<ul  class="grid">							
							<li class="grid-sizer "></li><!-- for Masonry column width -->						
							<li class=" col-md-3">
								<figure>
									<img src=<?= sprintf("%s ", $pincho1->getImagen()); ?> alt="">									
									<figcaption><h3><?= sprintf("%s ", $pincho1->getNombrePincho()); ?></h3>
										<p><?= sprintf("%s ", $pincho1->getDescripcionPincho()); ?> </p>
											<br>
										<div class="form-group">
											<form class="form-registro" method="POST" action="index.php?controller=Pincho&amp;action=meterVoto">
												<input type="hidden"   name="idPincho"  value=<?= sprintf("%s ", $pincho1->getIdPincho()); ?>>
                      							<input type="submit" class="btn btn-primary" value="Votar">
                      						</form>
                  						</div>								
									</figcaption>
								</figure>
							</li>		
							<li class=" col-md-3">
								<figure>
									<img src=<?= sprintf("%s ", $pincho2->getImagen()); ?> alt="">									
									<figcaption><h3><?= sprintf("%s ", $pincho2->getNombrePincho()); ?></h3>
										<p><?= sprintf("%s ", $pincho2->getDescripcionPincho()); ?> </p>
											<br>
										<div class="form-group">
											<form class="form-registro" method="POST" action="index.php?controller=Pincho&amp;action=meterVoto">
												<input type="hidden"   name="idPincho"  value=<?= sprintf("%s ", $pincho2->getIdPincho()); ?>>
                      							<input type="submit" class="btn btn-primary" value="Votar">
                      						</form>
                  						</div>								
									</figcaption>
								</figure>
							</li>	

							<li class=" col-md-3">
								<figure>	
									<img src=<?= sprintf("%s ", $pincho3->getImagen()); ?> alt="">									
									<figcaption><h3><?= sprintf("%s ", $pincho3->getNombrePincho()); ?></h3>
										<p><?= sprintf("%s ", $pincho3->getDescripcionPincho()); ?> </p>
											<br>
										<div class="form-group">
											<form class="form-registro" method="POST" action="index.php?controller=Pincho&amp;action=meterVoto">
												<input type="hidden"   name="idPincho"  value=<?= sprintf("%s ", $pincho3->getIdPincho()); ?>>
	                      						<input type="submit" class="btn btn-primary" value="Votar">
	                      					</form>
                  						</div>								
									</figcaption>
								</figure>
							</li>				
												
						</ul>

					</section><!-- // end small images -->
		        
					
				</div><!-- // grid-gallery -->
			</div>
	</section>

<?php 
	include ("includesCSS/includeJavascript.html");
?>
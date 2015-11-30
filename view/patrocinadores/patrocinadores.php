<?php 

include ("includesCSS/includeCss.html");

 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $patrocinadores = $view->getVariable("patrocinadores");
 $currentuser = $view->getVariable("currentusername"); 

 
 $view->setVariable("nombre", "View Patrociandores");
 
 include("view/users/menuSuperior.php");
?>


<section class="gallery                                                                                                                                                                              " id="gallery">
    <div class="container">
      <div class="heading text-center">
        <img class="dividerline" src="archivos/sep.png" alt="">
        <h2>Patrocinadores 2015</h2>
        <img class="dividerline" src="archivos/sep.png" alt="">
      </div>
      
      <div id="grid-gallery" class="grid-gallery">
          <section class="grid-wrap">
            <ul  class="grid">
             <li class="grid-sizer "></li><!-- for Masonry column width --> 
  <!--inicio -->    <?php foreach ($patrocinadores as $patrocinador) { ?>
              <li class=" col-md-3">
                <figure>                           
                                
                  <figcaption><h3><?= $patrocinador->getNombrePatrocinador() ?> </h3>
                    <p>Importe      :<?= $patrocinador->getImporte() ?> € </p>
                    <p>Telefono  :<?= $patrocinador->getTelefonoPatrocinador() ?> </p>
                  </figcaption>

                </figure>
              </li>
  <!--fin -->     <?php } ?>            
            </ul>

          </section><!-- // end small images -->
          
          
        </div><!-- // grid-gallery -->
      </div>
  </section>

<?php 
  include ("includesCSS/includeJavascript.html");
?>



<?php 

include ("includesCSS/includeCss.html");

 //file: view/posts/view.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $pinchos = $view->getVariable("pinchos");
 $currentuser = $view->getVariable("currentusername"); 

 
 $view->setVariable("nombre", "View Pincho");
 
?>

<br>
<br>
  <div class="tabs">
    <!--pesta–a 1 activa por defecto-->
    <div class="tab">
        <input type="radio" id="tab-1" name="tab-group-1" checked>
        <label for="tab-1">Tab 1</label>
        <!--contenido de la pesta–a 1-->
        <div class="content">
            <div class="container">
            <h2>Formulario de votacion de pinchos</h2>
            <h4>Introduzca los 3 codigos de los diferentes pinchos.</h4>
          
            <div >
              <form class="form-registro" method="POST" action="index.php?controller=Codigo&amp;action=validar">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="codigo1" name="codigo1">
            
                  </div>

                   <div class="form-group">
                        <input type="text" class="form-control" placeholder="codigo2" name="codigo2">
                   
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="codigo3" name="codigo3">               
                  </div>                 

                  <p></p>

                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Votar">
                  </div>
              </form>          
            </div>
        </div>
    </div>
    <!-- pesta–a 2-->
   
	</div>
</div>


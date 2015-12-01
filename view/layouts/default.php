<?php
 //file: view/layouts/default.php
include ("includesCSS/includeCss.html");
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $user = $view->getVariable("currentusername");
 $tipo = $view->getVariable("tipo");
 $errors = $view->getVariable("errors");

?><!DOCTYPE html>
<html>
  <head>
    <title><?= $view->getVariable("title", "no title") ?></title>
    <meta charset="utf-8">
    
    <?= $view->getFragment("css") ?>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <?= $view->getFragment("javascript") ?>
  </head>
  <body>
    <!-- header -->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">

        
        </div><!--/.navbar-collapse -->
        <div class="navwrapper">
          <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navArea">
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      
                    <?= isset($errors["general"])?$errors["general"]:"" ?>      
                    <?php if (isset($user)){  

                              //vista usuario normal (jurado Popular)

                        if ($tipo->getTipo() == "Jurado popular"){ ?>  
                          <li class="menuItem"><a href="index.php?controller=Pincho&amp;action=listarTodosPinchosValidados">Ver todos los pinchos</a></li>
                          <li class="menuItem"><a href="index.php?controller=Pincho&amp;action=votarFormularioPopular">Votar</a></li>
                          <li class="menuItem"><a href="index.php?controller=users&amp;action=mostrarJuradoPop"><?= $user?></a></li>    
                          <li class="menuItem"><a href="index.php?controller=Establecimiento&amp;action=listarEstablecimientos">Listar Establecimientos</a></li>    
                          <li class="menuItem"><a href="#gallery">Gastromapa</a></li>
                          <li><a href="index.php?controller=users&amp;action=logout">Logout</a></li>
                        <?php } 

                              //vista establecimiento

                        if ($tipo->getTipo() == "Establecimiento"){ ?>  
                         <li class="menuItem"><a href="index.php?controller=Pincho&amp;action=listarTodosPinchosValidados">Ver todos los pinchos</a></li>
                          <li class="menuItem"><a href="index.php?controller=Establecimiento&amp;action=vistaGenerarCodigo">Generar codigos</a></li>
                          <li class="menuItem"><a href="index.php?controller=Pincho&amp;action=add">Añadir un Pincho</a></li>
                          <li class="menuItem"><a href="#gallery">Mi Pincho</a></li> 
                          <li class="menuItem"><a href="index.php?controller=Establecimiento&amp;action=mostrar"><?= $user?></a></li>    
                          <li class="menuItem"><a href="index.php?controller=Premio&amp;action=listar">Premios</a></li> 
                          <li><a href="index.php?controller=users&amp;action=logout">Logout</a></li>
                        <?php } 

                              //vista administrador

                        if ($tipo->getTipo() == "Administrador"){ ?>  
                          <li class="menuItem"><a href="index.php?controller=Pincho&amp;action=listarTodosPinchosNoValidados">Validar pinchos de establecimientos</a></li>
                          <li class="menuItem"><a href="">Ver Folletos</a></li>
                          <li class="menuItem"><a href="index.php?controller=Folleto&amp;action=viewAddFolleto">add folleto</a></li>                  
                      <?= isset($errors["general"])?$errors["general"]:"" ?>      
                          <li class="menuItem"><a href="index.php?controller=Premio&amp;action=listar">Premios</a></li>
                          <li class="menuItem"><a href="index.php?controller=Patrocinador&amp;action=listar">Patrocinadores</a></li> 
                          <li><a href="index.php?controller=users&amp;action=logout">Logout</a></li>
                        <?php } 
                       } ?>


                                
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    


    </nav>
    <main>
      <div id="flash">
         <?= $view->popFlash() ?>
      </div>
        <?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
    </main>

   

  </body>
</html>

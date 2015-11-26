<?php
 //file: view/layouts/default.php
include ("includesCSS/includeCss.html");
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $user = $view->getVariable("currentusername");
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
                    <li class="menuItem"><a href="index.php?controller=Pincho&amp;action=listarTodosPinchosNoValidados">Validar pinchos de establecimientos</a></li>
                    <li class="menuItem"><a href="">shfhfghfhff</a></li>
                    <li class="menuItem"><a href="#gallery">Configuracion de cuenta</a></li>                    
                    <?= isset($errors["general"])?$errors["general"]:"" ?>      
                    <?php if (isset($user)){ ?>            
                     
                      <li><a href="#"><?= sprintf("%s ", $user) ?></a></li>
                      <li><a href="index.php?controller=users&amp;action=logout">Logout</a></li>
                  
                    <?php } ?>
                                
                  </ul>
                </div>
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

   <?php 
	include ("includesCSS/includeJavascript.html");
?>

  </body>
</html>

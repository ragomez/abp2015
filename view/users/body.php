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
  
<?php 
  include("view/users/menuSuperior.php");
?>


    <main>
      <div id="flash">
         <?= $view->popFlash() ?>
      </div>
        <?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
    </main>

   


  </body>
</html>

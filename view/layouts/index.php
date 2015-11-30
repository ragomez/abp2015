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
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">   
    <?= $view->getFragment("css") ?>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <?= $view->getFragment("javascript") ?>
  </head>

  <body>
    <!-- header -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <?= isset($errors["general"])?$errors["general"]:"" ?>
        <div id="navbar" class="navbar-collapse collapse">
      
          <?php if (isset($user)){ ?>
             
            <ul class="nav navbar-nav pull-right">
            <li><a href="#"><?= sprintf("%s ", $user); ?></a></li>
            <li><a href="index.php?controller=users&amp;action=logout">Logout</a></li>
          </ul>
          <?php }else{ ?>
          <form action="index.php?controller=users&action=login" method="POST" class="navbar-form navbar-right" role="form">
         
            <div class="form-group">
              <input type="text" placeholder="Login" name ="login" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Contraseña" name ="passwd" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Entrar</button>
            <a href ="index.php?controller=users&amp;action=register" type="submit" class="btn btn-success">Registrar</a>

          </form>

          <?php } ?>
        </div><!--/.navbar-collapse -->
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

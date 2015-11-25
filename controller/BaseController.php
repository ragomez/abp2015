<?php
//file: controller/BaseController.php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");


require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");
require_once(__DIR__."/../model/codigo.php");
require_once(__DIR__."/../model/codigoMapper.php");
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../model/PinchoMapper.php");
require_once(__DIR__."/../model/UsuarioGeneral.php");

/**
 * Class BaseController
 *
 * Implements a basic super constructor for
 * the controllers in the Blog App.
 * Basically, it provides some protected
 * attributes and view variables.
 * 
 * @author lipido <lipido@gmail.com>
 */
class BaseController {

  /**
   * The view manager instance
   * @var ViewManager
   */
  protected $view;
  
  /**
   * The current user instance
   * @var User
   */
  protected $currentUser;

  protected $currentCod1;
  protected $currentCod2;
  protected $currentCod3;
  protected $tipo;//para sacar el tipo de usuario

  public function __construct() {
    
    $this->view = ViewManager::getInstance();

    // get the current user and put it to the view
    if (session_status() == PHP_SESSION_NONE) {      
	session_start();
    }


    if(isset($_SESSION["currentuser"])) {
     
      $this->currentUser = new User(NULL,$_SESSION["currentuser"]);       
      //add current user to the view, since some views require it
      $usermapper = new UserMapper;
      $this->tipo = $usermapper->buscarPorLogin($_SESSION["currentuser"]);
      
      $this->view->setVariable("currentusername", $this->currentUser->getLogin());
      
    }    


    if(isset($_SESSION["currentcod1"]) && isset($_SESSION["currentcod2"])  && isset($_SESSION["currentcod3"])) {
      $codigomapper1 = new CodigoMapper();
      $this->currentCod1 = $codigomapper1->buscarPinchoPorCodigo($_SESSION["currentcod1"]);

      $codigomapper2 = new CodigoMapper();
      $this->currentCod2 = $codigomapper2->buscarPinchoPorCodigo($_SESSION["currentcod2"]);


      $codigomapper3 = new CodigoMapper();
      $this->currentCod3 = $codigomapper3->buscarPinchoPorCodigo($_SESSION["currentcod3"]);
    } 
  }
}

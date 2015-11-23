<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");
require_once(__DIR__."/../model/UserEstablecimiento.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

/**
 * Class UsersController
 * 
 * Controller to login, logout and user registration
 * 
 * @author lipido <lipido@gmail.com>
 */
class UsersController extends BaseController {
  
  /**
   * Reference to the UserMapper to interact
   * with the database
   * 
   * @var UserMapper
   */  
  private $userMapper;    
  
  public function __construct() {    
    parent::__construct();
    
    $this->userMapper = new UserMapper();

    // Users controller operates in a "welcome" layout
    // different to the "default" layout where the internal
    // menu is displayed
    $this->view->setLayout("default");     
  }

 /**
   * Action to login
   * 
   * Logins a user checking its creedentials agains
   * the database   
   * 
   * When called via GET, it shows the login form
   * When called via POST, it tries to login
   * 
   * The expected HTTP parameters are:
   * <ul>
   * <li>login: The username (via HTTP POST)</li>
   * <li>passwd: The password (via HTTP POST)</li>      
   * </ul>
   *
   * The views are:
   * <ul>
   * <li>posts/login: If this action is reached via HTTP GET (via include)</li>
   * <li>posts/index: If login succeds (via redirect)</li>   
   * <li>users/login: If validation fails (via include). Includes these view variables:</li>
   * <ul>   
   *  <li>errors: Array including validation errors</li>   
   * </ul>   
   * </ul>
   * 
   * @return void
   */


 public function index()
  { 
    $this->view->redirect("Pincho", "view");
    $this->view->render("pinchos", "pinchos"); 
  }





  public function login() {
    if (isset($_POST["login"])){ // reaching via HTTP Post...
      //process login form    
      if ($this->userMapper->isValidUser($_POST["login"],$_POST["passwd"])) {
	       $_SESSION["currentuser"]=$_POST["login"];
        
         	// send user to the restricted area (HTTP 302 code)
        	$this->view->redirect("users", "index");

      }else{

      	$errors = array();
      	$errors["general"] = "Username is not valid";
      	$this->view->setVariable("errors", $errors);
      }
    }      
    
    // render the view (/view/users/login.php)
    $this->view->setLayout("index");
    $this->view->render("users", "body");    
  }

 /**
   * Action to register
   * 
   * When called via GET, it shows the register form.
   * When called via POST, it tries to add the user
   * to the database.
   * 
   * The expected HTTP parameters are:
   * <ul>
   * <li>login: The username (via HTTP POST)</li>
   * <li>passwd: The password (via HTTP POST)</li>      
   * </ul>
   *
   * The views are:
   * <ul>
   * <li>users/register: If this action is reached via HTTP GET (via include)</li>
   * <li>users/login: If login succeds (via redirect)</li>
   * <li>users/register: If validation fails (via include). Includes these view variables:</li>
   * <ul>   
   *  <li>user: The current User instance, empty or being added
   *  (but not validated)</li>      
   *  <li>errors: Array including validation errors</li>   
   * </ul>   
   * </ul>
   * 
   * @return void
   */
  public function register() {
    
    $user = new User();
  
    if (isset($_POST["login"])){ // reaching via HTTP Post...
      $user = new User();
      if ($_POST["tipo"] == "Jurado popular"){
        $user->setIdJuradoPopular($_POST["idJuradoPopular"]);
        $user->setLogin($_POST["login"]);
        $user->setPasswd($_POST["passwd"]);
        $user->setDni($_POST["dni"]);
        $user->setName($_POST["name"]);  
        $user->setApellidos($_POST["apellidos"]);  
        $user->setMail($_POST["mail"]);    
        $user->setTelefono($_POST["telefono"]);
        $user->settipo($_POST["tipo"]);
      }else {
        if($_POST["tipo"] == "Establecimiento"){
          $user = new Establecimiento();
          //$idEstablecimiento=NULL, $login=NULL,$passwd=NULL, $cif=NULL, $nombre=NULL, $direccion=NULL, $horario=NULL, 
          // $paginaWeb=NULL,$telefono = NULL,$Pincho_idPincho = NULL,$tipo = NULL
            $user->setIdEstablecimiento(11111111);
            $user->setLogin($_POST["login"]);
            $user->setPasswd($_POST["passwd"]);
            $user->setCif($_POST["cif"]);
            $user->setNombre($_POST["nombreEstablecimiento"]);  
            $user->setDireccion($_POST["direccion"]);  
            $user->setHorario($_POST["horario"]);    
            $user->setPaginaWeb($_POST["paginaWeb"]);
            $user->setTelefono($_POST["telefono"]);                   
            $user->settipo($_POST["tipo"]);
        }
      }
      
      try{
      	$user->checkIsValidForRegister(); // if it fails, ValidationException
      	
      	// check if user exists in the database
      	if (!$this->userMapper->usernameExists($_POST["login"])){
      	
      	  // save the User object into the database
      	  $this->userMapper->save($user);
      	  
      	  // POST-REDIRECT-GET
      	  // Everything OK, we will redirect the user to the list of posts
      	  // We want to see a message after redirection, so we establish
      	  // a "flash" message (which is simply a Session variable) to be
      	  // get in the view after redirection.
      	  $this->view->setFlash("Username ".$user->getLogin()." successfully added. Please login now");
      	  
      	  // perform the redirection. More or less: 
      	  // header("Location: index.php?controller=users&action=login")
      	  // die();
      	  $this->view->redirect("users", "login");	  
      	} else {
      	  $errors = array();
      	  $errors["login"] = "Username already exists";
      	  $this->view->setVariable("errors", $errors);
      	}

      }catch(ValidationException $ex) {
      	// Get the errors array inside the exepction...
      	$errors = $ex->getErrors();
      	// And put it to the view as "errors" variable
      	$this->view->setVariable("errors", $errors);
      }
    }
    
    // Put the User object visible to the view
    $this->view->setVariable("user", $user);
    
    // render the view (/view/users/register.php)
    $this->view->render("users", "register");
    
  }

 /**
   * Action to logout
   * 
   * This action should be called via GET
   * 
   * No HTTP parameters are needed.
   *
   * The views are:
   * <ul>
   * <li>users/login (via redirect)</li>
   * </ul>
   *
   * @return void
   */
  public function logout() {
    session_destroy();
    
    // perform a redirection. More or less: 
    // header("Location: index.php?controller=users&action=login")
    // die();
    $this->view->redirect("users", "login");
   
  }
  
}

<?php
//file: controller/PostController.php


require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../model/PinchoMapper.php");
require_once(__DIR__."/../model/User.php");

require_once(__DIR__."/../model/codigo.php");
require_once(__DIR__."/../model/codigoMapper.php");


require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");

/**
 * Class PostsController
 * 
 * Controller to make a CRUDL of Posts entities
 * 
 * @author lipido <lipido@gmail.com>
 */
class PinchoController extends BaseController {
  
  /**
   * Reference to the PostMapper to interact
   * with the database
   * 
   * @var PostMapper
   */
  private $pinchoMapper;  
  
  public function __construct() { 
    parent::__construct();
    
    $this->pinchoMapper = new PinchoMapper; 
    $this->codigoMapper = new CodigoMapper;         

    $tipo=$this->tipo->getTipo();

   }
  
  
  /**
   * Action to list posts
   * 
   * Loads all the posts from the database.
   * No HTTP parameters are needed.
   * 
   * The views are:
   * <ul>
   * <li>posts/index (via include)</li>   
   * </ul>
   */

  public function index(){  //esta funcion se diferencia con al abajo en que una muestra una cabezara de imagen y otro no
    //se podria mejorar para siplicar pero weno...
    //POR QUE TENEMOS DOS VISTAS DE LOS MISMO?¿?¿? ESTO SOBRA
 
    
    // find the Post object in the database
    $pinchos=$this->pinchoMapper->findAll();    
    // put the Post object to the view
    $this->view->setVariable("pincho", $pincho);
    
    // check if comment is already on the view (for example as flash variable)
    // if not, put an empty Comment for the view

    
    // render the view (/view/posts/view.php)
    $this->view->render("pincho", "index"); 
    
  }
  
  

   

  public function add() {
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Adding posts requires login");
    }
    
    $pincho = new Pincho();
    
    if (isset($_POST["submit"])) { // reaching via HTTP Post...
      
      // populate the Post object with data form the form
      $pincho->setNombrePincho($_POST["nombrePincho"]);
      $pincho->setDescripcionPincho($_POST["descripcion"]);
      $pincho->setPrecio($_POST["precio"]);
      $pincho->setCeliaco($_POST["celiaco"]);
  
      
      // The user of the Post is the currentUser (user in session)
       
      try {
  // validate Post object
  $pincho->checkIsValidForCreate(); // if it fails, ValidationException
  
  // save the Post object into the database
  $this->pinchoMapper->save($pincho);
  
  // POST-REDIRECT-GET
  // Everything OK, we will redirect the user to the list of posts
  // We want to see a message after redirection, so we establish
  // a "flash" message (which is simply a Session variable) to be
  // get in the view after redirection.
  $this->view->setFlash("Pincho \"".$pincho->getNombrePincho()."\" successfully added.");
  
  // perform the redirection. More or less: 
  // header("Location: index.php?controller=posts&action=index")
  // die();
  $this->view->redirect("Pincho", "view");
  
      }catch(ValidationException $ex) {      
  // Get the errors array inside the exepction...
  $errors = $ex->getErrors(); 
  // And put it to the view as "errors" variable
  $this->view->setVariable("errors", $errors);
      }
    }
    
    // Put the Post object visible to the view
    $this->view->setVariable("pincho", $pincho);    
    
    // render the view (/view/posts/add.php)
    $this->view->render("pinchos", "add");
    
  }

  public function view(){  //esta funcion se diferencia con al abajo en que una muestra una cabezara de imagen y otro no
    //se podria mejorar para siplicar pero weno...
    //POR QUE TENEMOS DOS VISTAS DE LOS MISMO?¿?¿? ESTO SOBRA
 
    
    // find the Post object in the database
    $pinchos=$this->pinchoMapper->pinchosValidados();    
    // put the Post object to the view
    $this->view->setVariable("pinchos", $pinchos);
    
    // check if comment is already on the view (for example as flash variable)
    // if not, put an empty Comment for the view

    
    // render the view (/view/posts/view.php)
    $this->view->render("pinchos", "pinchos"); 
    
  }


  public function listarTodosPinchosValidados(){  //lista pinchos validados por el admin 
    
    // find the Post object in the database
    $pinchos=$this->pinchoMapper->pinchosValidados();    
    // put the Post object to the view
    $this->view->setVariable("pinchos", $pinchos);
    
    // check if comment is already on the view (for example as flash variable)
    // if not, put an empty Comment for the view    
    // render the view (/view/posts/view.php)
    
    $this->view->render("pinchos", "listarTodosPinchos");
    
  }


  public function listarTodosPinchosNoValidados(){   //lista pinchos no validados por el admin
    
    // find the Post object in the database
    
    $pinchos=$this->pinchoMapper->pinchosNoValidados();    
    // put the Post object to the view
    $this->view->setVariable("pinchos", $pinchos);
   
    
    // check if comment is already on the view (for example as flash variable)
    // if not, put an empty Comment for the view    
    // render the view (/view/posts/view.php)
    $this->view->render("viewAdmin", "validarPinchos");
    
  }

  public function validarPincho(){   //funcion del admin apra validar
    

    if (isset($_POST["submit"])){
     
      $this->pinchoMapper->validaPincho($_POST["idPincho"]);     
      $this->view->redirect("Pincho", "listarTodosPinchosNoValidados");
    }
   
    
    
  }

  

  public function votarFormularioPopular(){   
    

    $this->view->render("pinchos", "votarFormularioPopular");

  }
  
 

  public function mostrarPincho()//esto es de las 3 codigos de votacion para los pinchos populares
  // y en serio que le llamas mostrar a meter los codigos??? en serio? xD
  {
   

    $pincho1 =  $this->pinchoMapper->findById($_SESSION["currentcod1"]);
    $pincho2 =  $this->pinchoMapper->findById($_SESSION["currentcod2"]);   
    $pincho3 =  $this->pinchoMapper->findById($_SESSION["currentcod3"]);

    if($pincho1 && $pincho2 && $pincho3)
    {
      $this->view->setVariable("pincho1", $pincho1);
      $this->view->setVariable("pincho2", $pincho2);
      $this->view->setVariable("pincho3", $pincho3);
    }

    $this->view->render("pinchos", "votarPinchoPopular");

  }


  public function meterVoto(){//esto lo que hace es votar a los pinchos del jurado popular

      if (isset($_POST["submit"])){
        $user = new Pincho();     
        $user->setPuntosPopular(1);
      }

      $this->pinchoMapper->votar($_POST["idPincho"]);

      $this->view->redirect("Pincho", "listarTodosPinchos");

  }




}

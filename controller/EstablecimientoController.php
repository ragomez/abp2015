<?php
//file: controller/PostController.php


require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../model/PinchoMapper.php");
require_once(__DIR__."/../model/codigo.php");
require_once(__DIR__."/../model/codigoMapper.php");
require_once(__DIR__."/../model/User.php");

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");

/**
 * Class PostsController
 * 
 * Controller to make a CRUDL of Posts entities
 * 
 * @author lipido <lipido@gmail.com>
 */
class EstablecimientoController extends BaseController {
  

  private $usuarioMapper;  
  private $longitud = 8;

  public function __construct() { 
    parent::__construct();
    
    $this->usuarioMapper = new UserMapper();  
    $this->pinchoMapper = new PinchoMapper(); 
    $this->codigoMapper = new CodigoMapper;

    $tipo = $this->tipo->getTipo();
    
    $this->view->setLayout("default");     
  }
  

 
  public function index(){   
    
   
    $this->view->render("establecimientos", "index");
    
  }


  public function vistaGenerarCodigo(){   //esto lo hago apra buscar el pincho del estableciiento y lo enseño en su vista con un boton de generra codigo    
   
    $login = $this->currentUser->getLogin();
    $establecimiento = $this->usuarioMapper->buscarEstablecimiento($login);
    $idPincho = $establecimiento->getPincho_idPincho();


    $pinchos = $this->pinchoMapper->findById($idPincho);

    $this->view->setVariable("pinchos", $pinchos);
      
      // check if comment is already on the view (for example as flash variable)
      // if not, put an empty Comment for the view    
      // render the view (/view/posts/view.php)
    $this->view->render("establecimientos", "vistaGenerarCodigo");    
    
  }


 public function generarCodigoAleatorio($long) {//esta funcion genera una clave aleatora para los codigos de pinchos
     $key = '';
     $pattern = '1234567890';
     $max = strlen($pattern)-1;
     for($i=0;$i < $long;$i++) $key .= $pattern{mt_rand(0,$max)};
     return $key;
  }

  public function generarCodigo(){   //esto lo hago apra buscar el pincho del estableciiento y lo enseño en su vista con un boton de generra codigo    
   
    $codi = $this->generarCodigoAleatorio($this->longitud);
  
    if (isset($_POST["submit"])){
          $cod = new Codigo();
          $cod->setCodigoVotacion($codi);
          $cod->setCodigoEstado(0);
          $cod->setPincho_idPincho($_POST["idPincho"]);          
        }

    $this->codigoMapper->addCodigoGenerado($cod);

    $this->view->redirect("Establecimiento", "vistaGenerarCodigo");//redirigo a la funcion vistaGenrearCodigo ya que asi muestra de nuevo la miama pantalla
    
  }
 //lista todos estabs.

 public function listar(){  // Fuka
    
    $establecimientos=$this->usuarioMapper->findAll();
    $this->view->setVariable("establecimientos", $establecimientos);
    $this->view->render("establecimientos", "index");
    
  }

//muestra el perfil de un establecimiento

  public function mostrar(){
   if (!isset($this->currentUser)) {
      throw new Exception("user is mandatory");
    }

    $user=$this->currentUser->getLogin();
    $establecimiento= $this->usuarioMapper->buscarEstablecimiento($user);

    $this->view->setVariable("establecimiento",$establecimiento);
    $this->view->render("establecimientos","perfilEstab");
  }


//editar el perfild del establecimiento
  public function edit() {
     if (!isset($this->currentUser)) {
      throw new Exception("user is mandatory");
    }

    $user=$this->currentUser->getLogin();
    $establecimiento= $this->usuarioMapper->buscarEstablecimiento($user);
    
  
    
    if (isset($_POST["submit"])) { // reaching via HTTP Post...  
    
      // populate the Post object with data form the form
       
          $establecimiento->setNombre($_POST["nombreEstablecimiento"]);  
          $establecimiento->setPasswd($_POST["passwd"]);
          $establecimiento->setCif($_POST["cif"]);
          $establecimiento->setDireccion($_POST["direccion"]);  
          $establecimiento->setHorario($_POST["horario"]);    
          $establecimiento->setPaginaWeb($_POST["paginaWeb"]);
          $establecimiento->setTelefono($_POST["telefono"]);       
        
      try {
  // validate Post object
  $establecimiento->checkIsValidForUpdate(); // if it fails, ValidationException
  
  // update the Post object in the database
  $this->postMapper->update($establecimiento);
  
  // POST-REDIRECT-GET
  // Everything OK, we will redirect the user to the list of posts
  // We want to see a message after redirection, so we establish
  // a "flash" message (which is simply a Session variable) to be
  // get in the view after redirection.
//  $this->view->setFlash(sprintf(i18n("Establecimiento \"%s\" successfully updated."));
  
  // perform the redirection. More or less: 
  // header("Location: index.php?controller=posts&action=index")
  // die();
  $this->view->redirect("establecimiento", "mostrar");  
  
      }catch(ValidationException $ex) {
  // Get the errors array inside the exepction...
  $errors = $ex->getErrors();
  // And put it to the view as "errors" variable
  $this->view->setVariable("errors", $errors);
      }
    }
    
    // Put the Post object visible to the view
    $this->view->setVariable("establecimiento", $establecimiento);
    
    // render the view (/view/posts/add.php)
    $this->view->render("establecimiento", "edit");    
  }

}


?>
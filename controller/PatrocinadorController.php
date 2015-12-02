<?php
//file: controller/PostController.php


require_once(__DIR__."/../model/Patrocinador.php");
require_once(__DIR__."/../model/PatrocinadorMapper.php");
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");


class PatrocinadorController extends BaseController {
  
  private $patrocinadorMapper;  
  
  public function __construct() { 
    parent::__construct();
    
    $this->patrocinadorMapper = new PatrocinadorMapper;          
  }
  
  public function listar(){  // Fuka
    
    $patrocinadores=$this->patrocinadorMapper->findAll();
    $this->view->setVariable("patrocinadores", $patrocinadores);
    $this->view->render("patrocinadores", "patrocinadores");
    
  }
  

  public function add() { //fuka
   
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Adding patrocinador requires login");
    }
    
    $patrocinador = new Patrocinador();
    
    if (isset($_POST["submit"])) { // reaching via HTTP Post...
      
      $patrocinador->setNombrePatrocinador($_POST["nombrePatrocinador"]);
      $patrocinador->setImporte($_POST["importe"]);
      $patrocinador->setTelefonoPatrocinador($_POST["telefonoPatrocinador"]);
     

       
      try {
  
        $patrocinador->checkIsValidForCreate(); 
        $this->patrocinadorMapper->save($patrocinador);
                                                                                     
        $this->view->redirect("Patrocinador", "listar");   // redir a listar                                      
  
      }
      catch(ValidationException $ex) 
      {      
         $errors = $ex->getErrors();
         $this->view->setVariable("errors", $errors);
      }
    }
    
    
    $this->view->setVariable("patrocinador", $patrocinador);    
    $this->view->render("patrocinadores", "add");
    
  }
    
  public function edit() {
    
    if (!isset($this->currentUser)) {
      throw new Exception("Editar Patrocinador requiere iniciar sesion");
    }

    $patrocinadorNombre = $_REQUEST["nombrePatrocinador"];
    $patrocinador = $this->patrocinadorMapper->findByName($patrocinadorNombre);

    if ($patrocinador == NULL) {
      throw new Exception("Ningun patrocinador con el nombre \"".$patrocinadorNombre. "\"");
    }

    if (isset($_POST["submit"])) { // reaching via HTTP Post...  
      
      $patrocinador = new Patrocinador();

      $patrocinador->setIdPatrocinador($_POST["idPatrocinador"]);
      $patrocinador->setNombrePatrocinador($_POST["nombrePatrocinador"]);
      $patrocinador->setImporte($_POST["importe"]);
      $patrocinador->setTelefonoPatrocinador($_POST["telefonoPatrocinador"]);
      
      try {

	       $patrocinador->checkIsValidForUpdate(); // if it fails, ValidationException
	       $this->patrocinadorMapper->update($patrocinador);

	       $this->view->redirect("patrocinador", "listar");		
      }
      catch(ValidationException $ex) {

	       $errors = $ex->getErrors();
	       $this->view->setVariable("errors", $errors);
      }

    }

    $this->view->setVariable("patrocinador", $patrocinador);

    $this->view->render("patrocinadores", "edit");    
  }
     
  public function delete() {  
  
    if (!isset($this->currentUser)) {
      throw new Exception("Necesario iniciar sesion para eliminar.");
    }
    $patrocinadorNombre = $_REQUEST["nombrePatrocinador"];
    $patrocinador = $this->patrocinadorMapper->findByName($patrocinadorNombre);

    
    if ($patrocinador == NULL) {
      throw new Exception("Ningun patrocinador con el nombre \"".$patrocinadorNombre. "\"");
    }  
    
    $this->patrocinadorMapper->delete($patrocinador);   

    $this->view->redirect("patrocinador", "listar");
    
  }
   public function view(){  
    // find the Post object in the database
    $patrocinadoress=$this->patrocinadorMapper->findAll();    
    $this->view->setVariable("patrocinadores", $patrocinadores);

    $this->view->render("patrocinadores", "patrocinadores"); 
    
  }  
}

<?php
//file: controller/PostController.php


require_once(__DIR__."/../model/Premio.php");
require_once(__DIR__."/../model/PremioMapper.php");
//require_once(__DIR__."/../model/Patrocinador.php");
// Comentado ata definir patrocinador
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");

/**
 * Class PostsController
 * 
 * Controller to make a CRUDL of Posts entities
 * 
 * @author lipido <lipido@gmail.com>
 */
class PremioController extends BaseController {
  
  /**
   * Reference to the PremioMapper to interact
   * with the database
   * 
   * @var PremioMapper
   */
  private $premioMapper;  
  
  public function __construct() { 
    parent::__construct();
    
    $this->premioMapper = new PremioMapper;          
  }
  
  public function listar(){  // Fuka
    
    $premios=$this->premioMapper->findAll();
    $this->view->setVariable("premios", $premios);
    $this->view->render("premios", "premios");
    
  }
  

  public function add() { //fuka
   
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Adding premio requires login");
    }
    
    $premio = new Premio();
    
    if (isset($_POST["submit"])) { // reaching via HTTP Post...
      
      $premio->setImportePopular($_POST["importePopular"]);
      $premio->setImporteProfesional($_POST["importeProfesional"]);
      $premio->setFechaPremio($_POST["fechaPremio"]);
      $premio->setPatrocinador_idPatrocinador($_POST["patrocinador_idPatrocinador"]);
      $premio->setNombrePremio($_POST["nombrePremio"]);

       
      try {
  
        $premio->checkIsValidForCreate(); 
        $this->premioMapper->save($premio);

        $this->view->setFlash("Premio \"".$premio->getNombrePremio()."\" successfully added.");
                                                                                     
        $this->view->redirect("Premio", "listar");                                         
  
      }catch(ValidationException $ex) {      
         $errors = $ex->getErrors(); 
  
         $this->view->setVariable("errors", $errors);
      }
    }
    
    
    $this->view->setVariable("premio", $premio);    
    $this->view->render("premios", "add");
    
  }
    
  public function edit() {
    if (!isset($_REQUEST["nombrePremio"])) {
      throw new Exception("Es necesario un Nombre de premio");
    }
    
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editar premio requiere loguearse");
    }

    $premioNombre = $_REQUEST["nombrePremio"];
    $premio = $this->premioMapper->findById($premioNombre);

    if ($premio == NULL) {
      throw new Exception("Ningun premio con el nombre \"".$premioNombre. "\"");
    }

    if (isset($_POST["submit"])) { // reaching via HTTP Post...  
      $premio->setImportePopular($_POST["importePopular"]);
      $premio->setImporteProfesional($_POST["importeProfesional"]);
      $premio->setFechaPremio($_POST["fechaPremio"]);
      $premio->setPatrocinador_idPatrocinador($_POST["patrocinador_idPatrocinador"]);
      $premio->setNombrePremio($_POST["nombrePremio"]);
      
      try {

	       $premio->checkIsValidForUpdate(); // if it fails, ValidationException
	       $this->premioMapper->update($premio);
	
	       $this->view->setFlash(sprintf(i18n("Premio \"%s\" successfully updated."),$premio ->getNombrePremio()));

	       $this->view->redirect("premios", "index");		
      }
      catch(ValidationException $ex) {

	       $errors = $ex->getErrors();
	       $this->view->setVariable("errors", $errors);
      }

    }

    $this->view->setVariable("premio", $premio);

    $this->view->render("premios", "edit");    
  }
     
  public function delete() {  
    if (!isset($_POST["nombrePremio"])) {
      throw new Exception(" Nombre de premio es obligatorio");
    }
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editing premios requires login");
    }
    
     // Get the Post object from the database
    $premioNombre = $_REQUEST["nombrePremio"];
    $premio = $this->premioMapper->findByName($premioNombre);
    
    // Does the post exist?
    if ($premio == NULL) {
      throw new Exception("Ningun premio con el nombre \"".$premioNombre. "\"");
    }  
    
    // Check if the Post author is the currentUser (in Session)
    /*if ($post->getAuthor() != $this->currentUser) {
      throw new Exception("Post author is not the logged user");
    }
    */
    
    // Delete the Post object from the database
    $this->premioMapper->delete($premio);
    
    // POST-REDIRECT-GET
    // Everything OK, we will redirect the user to the list of posts
    // We want to see a message after redirection, so we establish
    // a "flash" message (which is simply a Session variable) to be
    // get in the view after redirection.
    $this->view->setFlash("Premio \"".$premio ->getNombrePremio()."\" successfully deleted.");    
    
    // perform the redirection. More or less: 
    // header("Location: index.php?controller=posts&action=index")
    // die();
    $this->view->redirect("premios", "index");
    
  }
   public function view(){  
    // find the Post object in the database
    $premios=$this->premioMapper->findAll();    
    $this->view->setVariable("premios", $premios);

    $this->view->render("premios", "premios"); 
    
  }  
}

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
    
    
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editar premio requiere loguearse");
    }

    $premioNombre = $_REQUEST["nombrePremio"];

    $premio = $this->premioMapper->findByName($premioNombre);

    if ($premio == NULL) {
      throw new Exception("Ningun premio con el nombre \"".$premioNombre. "\"");
    }

    if (isset($_POST["submit"])) { // reaching via HTTP Post...  
      $premio = new Premio();
      
      $premio->setImportePopular($_POST["importePopular"]);
      $premio->setImporteProfesional($_POST["importeProfesional"]);
      $premio->setFechaPremio($_POST["fechaPremio"]);
      $premio->setPatrocinador_idPatrocinador($_POST["patrocinador_idPatrocinador"]);
      $premio->setNombrePremio($_POST["nombrePremio"]);
      $premio->setIdPremio($_POST["idPremio"]);

      //print_r($premio);
      //die();

      try {

	       $premio->checkIsValidForUpdate(); // if it fails, ValidationException
	       $this->premioMapper->update($premio);
	
	       $this->view->setFlash(sprintf(i18n("Premio \"%s\" successfully updated."),$premio ->getNombrePremio()));

	       $this->view->redirect("premio", "listar");		
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
  
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editing premios requires login");
    }
    
    $premioNombre = $_REQUEST["nombrePremio"];
    $premio = $this->premioMapper->findByName($premioNombre);
      
    $this->premioMapper->delete($premio);
    $this->view->setFlash("Premio \"".$premio ->getNombrePremio()."\" successfully deleted.");    
    $this->view->redirect("premio", "listar");
    
  }

    public function index() {
  
    // obtain the data from the database
    $premios = $this->premioMapper->findAll();    
    
    // put the array containing Post object to the view
    $this->view->setVariable("premios", $premios);    
    
    // render the view (/view/posts/index.php)
    $this->view->render("premios", "listar");
  } 
}

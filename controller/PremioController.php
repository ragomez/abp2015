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
  

  /**
   * Action to view a given premio
   * 
   * This action should only be called via GET
   * 
   * The expected HTTP parameters are:
   * <ul>
   * <li>id: Id of the post (via HTTP GET)</li>   
   * </ul>
   * 
   * The views are:
   * <ul>
   * <li>posts/view: If post is successfully loaded (via include).  Includes these view variables:</li>
   * <ul>
   *  <li>post: The current Post retrieved</li>
   *  <li>comment: The current Comment instance, empty or 
   *  being added (but not validated)</li>
   * </ul>
   * </ul>
   * 
   * @throws Exception If no such post of the given id is found
   * @return void
   ******************* vista de un pincho ************ 
   * 
   */
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
  // validate Post object
  $premio->checkIsValidForCreate(); // if it fails, ValidationException
  
  // save the Post object into the database
  $this->premioMapper->save($premio);
  
  // POST-REDIRECT-GET
  // Everything OK, we will redirect the user to the list of premios
  // We want to see a message after redirection, so we establish
  // a "flash" message (which is simply a Session variable) to be
  // get in the view after redirection.
  $this->view->setFlash("Premio \"".$premio->getNombrePremio()."\" successfully added.");
  
  // perform the redirection. More or less: 
  // header("Location: index.php?controller=posts&action=index")
  // die();                                                                                   
  $this->view->redirect("Premio", "listar");                                         
  
      }catch(ValidationException $ex) {      
  // Get the errors array inside the exepction...
  $errors = $ex->getErrors(); 
  // And put it to the view as "errors" variable
  $this->view->setVariable("errors", $errors);
      }
    }
    
    // Put the Premio object visible to the view
    $this->view->setVariable("premio", $premio);    
    
    // render the view (/view/premios/add.php)
    $this->view->render("premios", "add");
    
  }
  
  /**
   * Action to edit a premio
   * 
   * When called via GET, it shows an edit form
   * including the current data of the Premio.
   * When called via POST, it modifies the premio in the
   * database.
   * 
   * The expected HTTP parameters are:
   * <ul>
   * <li>id: Id of the post (via HTTP POST and GET)</li>   
   * <li>title: Title of the post (via HTTP POST)</li>
   * <li>content: Content of the post (via HTTP POST)</li>      
   * </ul>
   * 
   * The views are:
   * <ul>
   * <li>posts/edit: If this action is reached via HTTP GET (via include)</li>
   * <li>posts/index: If post was successfully edited (via redirect)</li>
   * <li>posts/edit: If validation fails (via include). Includes these view variables:</li>
   * <ul>
   *  <li>post: The current Post instance, empty or being added (but not validated)</li>
   *  <li>errors: Array including per-field validation errors</li>   
   * </ul>
   * </ul>
   * @throws Exception if no id was provided
   * @throws Exception if no user is in session
   * @throws Exception if there is not any post with the provided id
   * @throws Exception if the current logged user is not the author of the post
   * @return void
   */  
  public function edit() {
    if (!isset($_REQUEST["nombrePremio"])) {
      throw new Exception("Es necesario un Nombre de premio");
    }
    
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editar premio requiere loguearse");
    }
    
    
    // Get the Post object from the database
    
    $premioNombre = $_REQUEST["nombrePremio"];
    $premio = $this->premioMapper->findById($premioNombre);
    
    // Does the post exist?
    if ($premio == NULL) {
      throw new Exception("Ningun premio con el nombre \"".$premioNombre. "\"");
    }

    
    // Check if the Post author is the currentUser (in Session)
   /** if ($post->getAuthor() != $this->currentUser) {
      throw new Exception("logged user is not the author of the post id ".$postid);
    }
    **/
    if (isset($_POST["submit"])) { // reaching via HTTP Post...  
    
      // populate the Post object with data form the form
      $premio->setImportePopular($_POST["importePopular"]);
      $premio->setImporteProfesional($_POST["importeProfesional"]);
      $premio->setFechaPremio($_POST["fechaPremio"]);
      $premio->setPatrocinador_idPatrocinador($_POST["patrocinador_idPatrocinador"]);
      $premio->setNombrePremio($_POST["nombrePremio"]);
      
      try {
	// validate Post object
	       $premio->checkIsValidForUpdate(); // if it fails, ValidationException
	
	// update the Post object in the database
	       $this->premioMapper->update($premio);
	// POST-REDIRECT-GET
	// Everything OK, we will redirect the user to the list of posts
	// We want to see a message after redirection, so we establish
	// a "flash" message (which is simply a Session variable) to be
	// get in the view after redirection.
	       $this->view->setFlash(sprintf(i18n("Premio \"%s\" successfully updated."),$premio ->getNombrePremio()));
	// perform the redirection. More or less: 
	// header("Location: index.php?controller=posts&action=index")
	// die();
	       $this->view->redirect("premios", "index");		
      }
      catch(ValidationException $ex) {
	// Get the errors array inside the exepction...
	       $errors = $ex->getErrors();
	// And put it to the view as "errors" variable
	       $this->view->setVariable("errors", $errors);
      }

    }
    
    // Put the Post object visible to the view
    $this->view->setVariable("premio", $premio);
    
    // render the view (/view/premio/add.php)
    $this->view->render("premios", "edit");    
  }
  
  /**
   * Action to delete a post
   * 
   * This action should only be called via HTTP POST
   * 
   * The expected HTTP parameters are:
   * <ul>
   * <li>id: Id of the post (via HTTP POST)</li>   
   * </ul>
   * 
   * The views are:
   * <ul>
   * <li>posts/index: If post was successfully deleted (via redirect)</li>
   * </ul>
   * @throws Exception if no id was provided
   * @throws Exception if no user is in session
   * @throws Exception if there is not any post with the provided id
   * @throws Exception if the author of the post to be deleted is not the current user
   * @return void
   */    
  public function delete() {  
    if (!isset($_POST["nombrePremio"])) {
      throw new Exception(" Nombre de premio es obligatorio");
    }
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editing premios requires login");
    }
    
     // Get the Post object from the database
    $premioNombre = $_REQUEST["nombrePremio"];
    $premio = $this->premioMapper->findById($premionombre);
    
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
}

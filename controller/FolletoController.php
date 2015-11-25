<?php

require_once(__DIR__."/../model/Folleto.php");
require_once(__DIR__."/../model/FolletoMapper.php");
require_once(__DIR__."/../model/Administrador.php");

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");

class FolletoController extends BaseController {
  
 
  private $folletoMapper;  
  
  public function __construct() { 
    parent::__construct();
    
    $this->folletoMapper = new FolletoMapper();          
  }
  ublic function view(){
    
 
    
    // find the Folleto object in the database
    $folletos=$this->folletoMapper->findAll();
    
    // put the Folleto object to the view
    $this->view->setVariable("folletos", $folletos);
    
    // check if comment is already on the view (for example as flash variable)
    // if not, put an empty Comment for the view

    
    // render the view (/view/posts/view.php)
    $this->view->render("folletos", "folletos");
    
  }
  
  /**
   * Action to add a new post
   * 
   * When called via GET, it shows the add form
   * When called via POST, it adds the post to the
   * database
   * 
   * The expected HTTP parameters are:
   * <ul>
   * <li>title: Title of the post (via HTTP POST)</li>
   * <li>content: Content of the post (via HTTP POST)</li>      
   * </ul>
   * 
   * The views are:
   * <ul>
   * <li>posts/add: If this action is reached via HTTP GET (via include)</li>   
   * <li>posts/index: If post was successfully added (via redirect)</li>
   * <li>posts/add: If validation fails (via include). Includes these view variables:</li>
   * <ul>
   *  <li>post: The current Post instance, empty or 
   *  being added (but not validated)</li>
   *  <li>errors: Array including per-field validation errors</li>   
   * </ul>
   * </ul>
   * @throws Exception if no user is in session
   * @return void
   */
  public function add() {
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Adding folleto requires login");
    }
    
    $folleto = new Folleto();
    
    if (isset($_POST["submit"])) { // reaching via HTTP Post...
      
      // populate the Folleto object with data form the form
      $folleto->setTitulo($_POST["titulo"]);
      $folleto->setDescripcion($_POST["descripcion"]);
      $folleto->setFechaInicio($_POST["fechaInicio"]);
      $folleto>setAdministrador_idAdministrador($_POST["administrador_idAdministrador"]);
  
      
      // The user of the Folleto is the currentUser (user in session)
       
      try {
  // validate Post object
  $folleto->checkIsValidForCreate(); // if it fails, ValidationException
  
  // save the Post object into the database
  $this->folletoMapper->save($folleto);
  
  // POST-REDIRECT-GET
  // Everything OK, we will redirect the user to the list of folletos
  // We want to see a message after redirection, so we establish
  // a "flash" message (which is simply a Session variable) to be
  // get in the view after redirection.
  $this->view->setFlash("Folleto \"".$folleto->getIdFolleto()."\" successfully added.");
  
  // perform the redirection. More or less: 
  // header("Location: index.php?controller=posts&action=index")
  // die();
  $this->view->redirect("Folleto", "view");
  
      }catch(ValidationException $ex) {      
  // Get the errors array inside the exepction...
  $errors = $ex->getErrors(); 
  // And put it to the view as "errors" variable
  $this->view->setVariable("errors", $errors);
      }
    }
    
    // Put the Folleto object visible to the view
    $this->view->setVariable("folleto", $folleto);    
    
    // render the view (/view/folleto/add.php)
    $this->view->render("folletos", "add");
    
  }
  
  /**
   * Action to edit a folleto
   * 
   * When called via GET, it shows an edit form
   * including the current data of the Folleto.
   * When called via POST, it modifies the folleto in the
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
    if (!isset($_REQUEST["idFolleto"])) {
      throw new Exception("A folleto id is mandatory");
    }
    
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editing folleto requires login");
    }
    
    
    // Get the Post object from the database
    $folletoid = $_REQUEST["idFolleto"];
    $folleto = $this->folletoMapper->findById($folletoid);
    
    // Does the post exist?
    if ($folleto == NULL) {
      throw new Exception("no such folleto with id: ".$folletoid);
    }
    
    // Check if the Post author is the currentUser (in Session)
   /** if ($post->getAuthor() != $this->currentUser) {
      throw new Exception("logged user is not the author of the post id ".$postid);
    }
    **/
    if (isset($_POST["submit"])) { // reaching via HTTP Post...  
    
      // populate the Post object with data form the form
      $folleto->setTitulo($_POST["titulo"]);
      $folleto->setDescripcion($_POST["descripcion"]);
      $folleto->setFechaInicio($_POST["fechaInicio"]);
      $folleto->setFechaFin($_POST["fechaFin"]);
      $folleto->setAdministrador_idAdministrador($_POST["administrador_idAdministrador"]);
      
      try {
	// validate Post object
	$folleto->checkIsValidForUpdate(); // if it fails, ValidationException
	
	// update the Post object in the database
	$this->folletoMapper->update($folleto);
	
	// POST-REDIRECT-GET
	// Everything OK, we will redirect the user to the list of posts
	// We want to see a message after redirection, so we establish
	// a "flash" message (which is simply a Session variable) to be
	// get in the view after redirection.
	$this->view->setFlash(sprintf(i18n("Folleto \"%s\" successfully updated."),$folleto ->getIdFolleto()));
	
	// perform the redirection. More or less: 
	// header("Location: index.php?controller=posts&action=index")
	// die();
	$this->view->redirect("folletos", "index");	
	
      }catch(ValidationException $ex) {
	// Get the errors array inside the exepction...
	$errors = $ex->getErrors();
	// And put it to the view as "errors" variable
	$this->view->setVariable("errors", $errors);
      }
    }
    
    // Put the Post object visible to the view
    $this->view->setVariable("folleto", $folleto);
    
    // render the view (/view/folleto/add.php)
    $this->view->render("folletos", "edit");    
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
    if (!isset($_POST["idFolleto"])) {
      throw new Exception("id is mandatory");
    }
    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Editing folletos requires login");
    }
    
     // Get the Post object from the database
    $folletoid = $_REQUEST["idFolleto"];
    $folleto = $this->folletoMapper->findById($folletoid);
    
    // Does the post exist?
    if ($folleto == NULL) {
      throw new Exception("no such folleto with id: ".$folletoid);
    }  
    
    // Check if the Post author is the currentUser (in Session)
    /*if ($post->getAuthor() != $this->currentUser) {
      throw new Exception("Post author is not the logged user");
    }
    */
    
    // Delete the Post object from the database
    $this->folletoMapper->delete($folleto);
    
    // POST-REDIRECT-GET
    // Everything OK, we will redirect the user to the list of posts
    // We want to see a message after redirection, so we establish
    // a "flash" message (which is simply a Session variable) to be
    // get in the view after redirection.
    $this->view->setFlash("Folleto \"".$folleto ->getIdFolleto()."\" successfully deleted.");    
    
    // perform the redirection. More or less: 
    // header("Location: index.php?controller=posts&action=index")
    // die();
    $this->view->redirect("folletos", "index");
    
  }  
}

?>

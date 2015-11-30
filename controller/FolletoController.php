<?php

require_once(__DIR__."/../model/Folleto.php");
require_once(__DIR__."/../model/FolletoMapper.php");


require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");



class FolletoController extends BaseController {

  
  private $folletoMapper;  
  
  public function __construct() { 
    parent::__construct();
      

    $this->folletoMapper = new FolletoMapper();          
  }
  public function view(){
    
 
    
    // find the Folleto object in the database
    $folleto=$this->folletoMapper->findAll();
    
    // put the Folleto object to the view
    $this->view->setVariable("folletos", $fol);
    
    $this->view->render("viewFolleto", "view");
    
  }


public function viewAddFolleto(){

    $this->view->render("viewFolleto","add");

}


  public function formularioAdd(){

    

    $folleto = new Folleto();

    if (isset($_POST["submit"])) { // reaching via HTTP Post...
     
      // populate the Folleto object with data form the form
      $folleto->setTitulo($_POST["titulo"]);
      $folleto->setDescripcion($_POST["descripcion"]);
      $folleto->setFechaInicio($_POST["fechaInicio"]);
      $folleto->setFechaFin($_POST["fechaFin"]);
      $folleto->setAdministrador_idAdministrador(1); 

   

      if (!$this->folletoMapper->folletoExists($_POST["titulo"])){



          $this->folletoMapper->save($folleto);           
          /*$this->view->setVariable("folleto", $folleto);
          */


          $fol = $this->folletoMapper->findById($_POST["titulo"]);

          $this->view->setVariable("fol", $fol);
          $this->view->render("viewFolleto", "view");
    
      }  
       
    }

}
  public function formularioAEdit(){

    $this->view->render("viewFolleto","edit");


  }
  

  public function edit() {
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
  

  public function listar(){
    
    $folletos=$this->folletoMapper->findAll();

    $this->view->setVariable("folletos", $folletos);

    $this->view->render("viewFolleto", "folletos");
  }


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
<?php
// file: model/Post.php

require_once(__DIR__."/../core/ValidationException.php");


class Patrocinador {

// CONTADOR VOOS POP ELIMINADO

 
 private $idPatrocinador;
 private $nombrePatrocinador;
 private $importe;
 private $telefonoPatrocinador;
 


  public function __construct($idPatrocinador=NULL,  $nombrePatrocinador=NULL, $importe=0, $telefonoPatrocinador=NULL )
  {
    $this->idPatrocinador   =  $idPatrocinador;
    $this->nombrePatrocinador  = $nombrePatrocinador;
    $this->importe = $importe;
    $this->telefonoPatrocinador = $telefonoPatrocinador; 
  }

  /**
  GETTERS
   */ 

  public function getIdPatrocinador() {
    return $this->idPatrocinador;
  }  
  public function getNombrePatrocinador() {
    return $this->nombrePatrocinador;
  }
  public function getImporte() {
    return $this->importe;
  }
  public function getTelefonoPatrocinador() {
    return $this->telefonoPatrocinador;
  }
// Setters
       
  
  public function setNombrePatrocinador($nombrePatrocinador) {
    $this->nombrePatrocinador = $nombrePatrocinador;
  }
  public function setImporte($importe) {
    $this->importe = $importe;
  }
  public function setTelefonoPatrocinador($telefonoPatrocinador) {
    $this->telefonoPatrocinador =  $telefonoPatrocinador;
  }
  
      
  public function checkIsValidForCreate() {
      $errors = array();
      if (strlen(trim($this->nombrePatrocinador)) == NULL ) {
	$errors["nombrePatrocinador"] = "el nombre del patrocinador es requerido";
      }
      if ($this->importe == 0 ) {
	$errors["importe"] = "importe es requerido";
      }
      if (strlen(trim($this->telefonoPatrocinador)) == NULL) {
	$errors["telefonoPatrocinador"] = "El telefono del patrocinador es requerido";
      }
      
      if (sizeof($errors) > 0){
	throw new ValidationException($errors, "No se ha podido introducir el Patrocinador");
      }
  }

  
  public function checkIsValidForUpdate() {
    $errors = array();
    
    
    try{
      $this->checkIsValidForCreate();
    }catch(ValidationException $ex) {
      foreach ($ex->getErrors() as $key=>$error) {
	$errors[$key] = $error;
      }
    }    
    if (sizeof($errors) > 0) {
      throw new ValidationException($errors, "Patrocinador no valido");
    }
  }
}

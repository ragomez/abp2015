<?php
// file: model/Post.php

require_once(__DIR__."/../core/ValidationException.php");


class Pincho {

// CONTADOR VOOS POP ELIMINADO

 
 private $idPincho;
 private $nombrePincho;
 private $descripcionPincho;
 private $precio;
 private $celiaco;
 private $estado;
 private $ganadorPopular;
 private $ganadorProfesional;
 private $puntosPopular;
 private $mediaPuntosProfesional;
 private $imagen;

   //GANADORES,NO ES TIPO BOOL? DECLARADO VARCHAR EN BD

  public function __construct($idPincho=NULL,  $nombrePincho=NULL, $descripcionPincho=NULL, $precio=0, $celiaco=NULL,
  $estado = NULL,  $ganadorPopular=NULL, $ganadorProfesional=NULL, $puntosPopular=NULL, $mediaPuntosProfesional=NULL, $imagen=NULL) {

$this->idPincho=$idPincho;
$this->nombrePincho=$nombrePincho;
$this->descripcionPincho= $descripcionPincho;
$this->precio=  $precio;
$this->celiaco = $celiaco;
$this->estado= $estado;
$this->ganadorPopular=  $ganadorPopular;
$this->ganadorProfesional=  $ganadorProfesional;
$this->puntosPopular=  $puntosPopular;
$this->mediaPuntosProfesional= $mediaPuntosProfesional;
$this->imagen=$imagen;

    
  }

  /**
  GETTERS
   */ 

  public function getIdPincho() {
    return $this->idPincho;
  }  
  public function getNombrePincho() {
    return $this->nombrePincho;
  }
  public function getDescripcionPincho() {
    return $this->descripcionPincho;
  }
  public function getPrecio() {
    return $this->precio;
  }
  public function getCeliaco() {
    return $this->celiaco;
  }
  public function getEstado() {
    return $this->estado;
  }
  public function getGanadorPopular() {
    return $this->ganadorPopular;
  }
  public function getGanadorProfesional() {
    return $this->ganadorProfesional;
  } 
  public function getPuntosPopular() {
    return $this->puntosPopular;
  }
  public function getMediaPuntosProfesional() {
    return $this->mediaPuntosProfesional;
  }  
  public function getImagen() {
    return $this->imagen;
  }

/**
Setters
 **/      
  
  public function setNombrePincho($nombrePincho) {
    $this->nombrePincho=$nombrePincho;
  }
  public function setDescripcionPincho($descripcionPincho) {
    $this->descripcionPincho= $descripcionPincho;
  }
  public function setPrecio($precio) {
    $this->precio=  $precio;
  }
  public function setCeliaco($celiaco) {
    $this->celiaco = $celiaco;
  }
  public function setEstado($estado) {
    $this->estado= $estado;
  }
  public function setGanadorPopular($ganadorPopular) {
    $this->ganadorPopular=  $ganadorPopular;
  }
  public function setGanadorProfesional($ganadorProfesional) {
    $this->ganadorProfesional=  $ganadorProfesional;
  }
  public function setMediaPuntosProfesional($mediaPuntosProfesional) {
    $this->mediaPuntosProfesional= $mediaPuntosProfesional;
  }
  public function setPuntosPopular($puntosPopular) {
    $this->puntosPopular=  $puntosPopular;
  }
  public function setImagen($imagen) {
    $this->imagen=$imagen;
  }

  /**
   * Checks if the current instance is valid
   * for being updated in the database.
   * 
   * @throws ValidationException if the instance is
   * not valid
   * 
   * @return void
   */    
  public function checkIsValidForCreate() {
      $errors = array();
      if (strlen(trim($this->nombrePincho)) == NULL ) {
	$errors["nombrePincho"] = "el nombre del pincho es requerido";
      }
      if (strlen(trim($this->descripcionPincho)) == NULL ) {
	$errors["descripcionPincho"] = "descripcionPincho es requerido";
      }
      if ($this->precio == 0 ) {
	$errors["precio"] = "precio es requerido";
      }
      
      if (sizeof($errors) > 0){
	throw new ValidationException($errors, "No se ha podido introducir el pincho, check is for create");
      }
  }

  /**
   * Checks if the current instance is valid
   * for being updated in the database.
   * 
   * @throws ValidationException if the instance is
   * not valid
   * 
   * @return void
   */
  public function checkIsValidForUpdate() {
    $errors = array();
    
    if (!isset($this->id)) {      
      $errors["idPincho"] = "id is mandatory";
    }
    
    try{
      $this->checkIsValidForCreate();
    }catch(ValidationException $ex) {
      foreach ($ex->getErrors() as $key=>$error) {
	$errors[$key] = $error;
      }
    }    
    if (sizeof($errors) > 0) {
      throw new ValidationException($errors, "pincho is not valid, check valid for update");
    }
  }
}

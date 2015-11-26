<?php
// file: model/User.php

require_once(__DIR__."/../core/ValidationException.php");

/**
 * Class User
 * 
 * Represents a User in the blog
 * 
 * @author lipido <lipido@gmail.com>
 */
class Codigo {

  
 private $idCodigo;
 private $codigoVotacion;

 private $codigoEstado;
 private $Pincho_idPincho; 
  /**
   * The constructor
   * 
   * @param string $username The name of the user
   * @param string $passwd The password of the user
   */
  public function __construct($idCodigo=NULL, $codigoVotacion=NULL,$codigoEstado=NULL, $Pincho_idPincho=NULL) {
    $this->idCodigo = $idCodigo;
    $this->codigoVotacion = $codigoVotacion; 

    $this->codigoEstado = $codigoEstado;
    $this->Pincho_idPincho = $Pincho_idPincho;
}
  
  public function getIdCodigo() {
    return $this->idCodigo;
  }

  public function getCodigoVotacion() {
    return $this->codigoVotacion;
  } 


  public function getCodigoEstado() {
    return $this->codigoEstado;
  } 

  public function getPincho_idPincho() {
    return $this->Pincho_idPincho;
  } 

  //SETTERS
 
  public function setIdCodigo($idCodigo) {
    $this->idCodigo = $idCodigo;
  }
  
  public function setCodigoVotacion($codigoVotacion) {
    $this->codigoVotacion= $codigoVotacion;
  }

  
  public function setCodigoEstado($codigoEstado) {
    $this->codigoEstado = $codigoEstado;
  }
  public function setPincho_idPincho($Pincho_idPincho) {
    $this->Pincho_idPincho = $Pincho_idPincho;
  }
 
 

  /**
   * Checks if the current user instance is valid
   * for being registered in the database
   * 
   * @throws ValidationException if the instance is
   * not valid
   * 
   * @return void
   */  
  public function checkIsValidForRegister() {
      $errors = array();
      if (strlen($this->login) < 5) {
	$errors["username"] = "Username must be at least 5 characters length";
	
      }
      if (strlen($this->passwd) < 5) {
	$errors["passwd"] = "Password must be at least 5 characters length";	
      }
      if (sizeof($errors)>0){
	throw new ValidationException($errors, "user is not valid");
      }
  } 
}
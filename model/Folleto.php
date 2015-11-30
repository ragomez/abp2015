<?php
// file: model/Folleto.php

require_once(__DIR__."/../core/ValidationException.php");


class Folleto {

 
  private $titulo;
  private $descripcion;
  private $fechaInicio;
  private $fechaFin;
  private $administrador_idAdministrador;


  /*
   * Constructor
   */

  public function __construct($titulo=NULL, $descripcion=NULL, $fechaInicio=NULL, $fechaFin=NULL,$administrador_idAdministrador=NULL) {
    $this->titulo = $titulo; 
    $this->descripcion = $descripcion;
    $this->fechaInicio = $fechaInicio;
    $this->fechaFin = $fechaFin;
    $this->administrador_idAdministrador = $administrador_idAdministrador;

  }


//GETTERS

  public function getTitulo() {
    return $this->titulo;
  } 
  public function getDescripcion() {
    return $this->descripcion;
  } 
  public function getFechaInicio() {
    return $this->fechaInicio;
  } 
  public function getFechaFin() {
    return $this->fechaFin;
  } 
  public function getAdministrador_idAdministrador() {
    return $this->administrador_idAdministrador;
  }

//SETTERS 


  public function setTitulo($titulo) {
    $this->titulo = $titulo;
  }
  
  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }
  public function setFechaInicio($fechaInicio) {
    $this->fechaInicio = $fechaInicio;
  }
  public function setFechaFin($fechaFin) {
    $this->fechaFin = $fechaFin;
  }
  public function setAdministrador_idAdministrador($administrador_idAdministrador) {
    $this->administrador_idAdministrador = $administrador_idAdministrador;
  }

  public function checkIsValidForCreate() {
      $errors = array();
      if (strlen(trim($this->titulo)) == NULL ) {
	$errors["titulo"] = "el titulo del follleto es requerido";
      }
      if (strlen(trim($this->descripcion)) == NULL ) {
	$errors["descripcion"] = "descripcion es requerido";
      }
      
      if (sizeof($errors) > 0){
	throw new ValidationException($errors, "No se ha podido introducir el folleto, check is for create");
      }
  }
}

?>
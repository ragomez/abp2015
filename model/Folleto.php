<?php
// file: model/Folleto.php

require_once(__DIR__."/../core/ValidationException.php");


class Folleto {

  private $idFolleto;
  private $titulo;
  private $name;
  private $descripcion;
  private $fechaInicio;
  private $fechaFin;

  /*
   * Constructor
   */

  public function __construct($idFolleto=NULL, $titulo=NULL,$name=NULL, $descripcion=NULL, $fechaInicio=NULL, $fechaFin=NULL) {
    $this->idFolleto = $idFolleto;
    $this->titulo = $titulo; 
    $this->descripcion = $descripcion;
    $this->fechaInicio = $fechaInicio;
    $this->fechaFin = $fechaFin;

  }


//GETTERS
  public function getIdFolleto() {
    return 2;
  }
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

//SETTERS 
  public function setIdFolleto($idFolleto) {
    $this->idFolleto = $idFolleto;
  }

  public function setTitulo($titulo) {
    $this->titulo = $titulo;
  }
  
  public function setDecripcion($descripcion) {
    $this->descripcion = $descripcion;
  }
  public function setFechaInicio($fechaInicio) {
    $this->fechaInicio = $fechaInicio;
  }
  public function setFechaFin($fechaFin) {
    $this->fechaFin = $fechaFin;
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

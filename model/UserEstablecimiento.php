<?php
// file: model/User.php

require_once(__DIR__."/../core/ValidationException.php");

class Establecimiento {
  //  idEstablecimiento, cif,nombre,direccion,horario,paginaWeb,telefono,Pincho_idPincho, tipo
  private $login;	
  private $passwd;		
  private $idEstablecimiento;
  private $cif;
  private $nombre;
  private $direccion;
  private $horario;
  private $paginaWeb;
  private $telefono;
  private $Pincho_idPincho;
  private $tipo;
  
  /**
   * The constructor
   * 
   * @param string $username The name of the user
   * @param string $passwd The password of the user
   */
  public function __construct($idEstablecimiento=NULL, $login=NULL,$passwd=NULL, $cif=NULL, $nombre=NULL, $direccion=NULL, $horario=NULL,  $paginaWeb=NULL,$telefono = NULL,$Pincho_idPincho = NULL,$tipo = NULL) {
    $this->idEstablecimiento = $idEstablecimiento; 
    $this->login = $login;
    $this->passwd = $passwd; 
    $this->cif = $cif;
    $this->nombre = $nombre;
    $this->direccion = $direccion;
    $this->horario = $horario;
    $this->paginaWeb = $paginaWeb;
    $this->telefono = $telefono;
    $this->Pincho_idPincho = $Pincho_idPincho;      
    $this->tipo = $tipo;
  }

  //gets


  public function getIdEstablecimiento() {
    //return $this->idJuradoPopular;
    //$this->idJuradoPopular = $this->idJuradoPopular +1;
    //return $this->idJuradoPopular;
    return $this->idEstablecimiento;
  
  } 

  public function getCif() {
    return $this->cif;
  } 

  public function getLogin() {
    return $this->login;
  }

  public function getPasswd() {
    return $this->passwd;
  } 
  public function getNombre() {
    return $this->nombre;
  } 
  public function getDireccion() {
    return $this->direccion;
  } 
  public function getPaginaWeb() {
    return $this->paginaWeb;
  } 
  public function getHorario() {
    return $this->horario;
  } 
  public function getTelefono() {
    return $this->telefono;
  } 

  public function getPincho_idPincho() {
    return 2;
  } 

  public function getTipo(){
    return $this->tipo;
  }
  


  //sets


  public function setIdEstablecimiento($idEstablecimiento) {
    $this->idEstablecimiento = $idEstablecimiento;
  }     


  public function setCif($cif) {
    $this->cif = $cif;
  }
    
   public function setLogin($login) {
    $this->login = $login;
  }  

  public function setPasswd($passwd) {
    $this->passwd = $passwd;
  }
  
  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }
  public function setDireccion($direccion) {
    $this->direccion = $direccion;
  }

  public function setPaginaWeb($paginaWeb) {
    $this->paginaWeb = $paginaWeb;
  }

  public function setHorario($horario) {
    $this->horario = $horario;
  }

  public function setTelefono($telefono) {
    $this->telefono = $telefono;
  }

  public function setPincho_idPincho($Pincho_idPincho) {
    $this->Pincho_idPincho = $Pincho_idPincho;
  }


  public function setTipo($tipo) {
    $this->tipo = $tipo;
  }




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
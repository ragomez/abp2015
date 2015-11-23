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
class User {

  
  private $login;

  /**
   * The password of the user
   * @var string
   */
  private $passwd;
  private $mail;
  private $name;
  private $apellidos;
  private $dni;
  private $telefono;
  private $idJuradoPopular;
  private $tipo;
  
  /**
   * The constructor
   * 
   * @param string $username The name of the user
   * @param string $passwd The password of the user
   */
  public function __construct($idJuradoPopular=NULL, $login=NULL,$passwd=NULL, $dni=NULL, $name=NULL, $apellidos=NULL, $mail=NULL,  $telefono=NULL,$tipo = NULL) {
    $this->login = $login;
    $this->passwd = $passwd; 
    $this->mail = $mail;
    $this->apellidos = $apellidos;
    $this->name = $name;
    $this->dni = $dni;
    $this->telefono = $telefono;  
    $this->idJuradoPopular = $idJuradoPopular; 
    $this->tipo = $tipo;
  }

  /**
   * Gets the username of this user
   * 
   * @return string The username of this user
   */  
  public function getLogin() {
    return $this->login;
  }

  public function getPasswd() {
    return $this->passwd;
  } 
  public function getName() {
    return $this->name;
  } 
  public function getApellidos() {
    return $this->apellidos;
  } 
  public function getDni() {
    return $this->dni;
  } 
  public function getMail() {
    return $this->mail;
  } 
  public function getTelefono() {
    return $this->telefono;
  } 

  public function getIdJuradoPopular() {
    //return $this->idJuradoPopular;
    //$this->idJuradoPopular = $this->idJuradoPopular +1;
    //return $this->idJuradoPopular;
    return 2;
  
  } 

  public function getTipo(){
    return $this->tipo;
  }
  /**
   * Sets the username of this user
   * 
   * @param string $username The username of this user
   * @return void
   */  
  public function setLogin($login) {
    $this->login = $login;
  }
  
  /**
   * Gets the password of this user
   * 
   * @return string The password of this user
   */  
   
  /**
   * Sets the password of this user
   * 
   * @param string $passwd The password of this user
   * @return void
   */    
  public function setPasswd($passwd) {
    $this->passwd = $passwd;
  }
  
  public function setName($name) {
    $this->name = $name;
  }
  public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
  }
  public function setDni($dni) {
    $this->dni = $dni;
  }
  public function setTelefono($telefono) {
    $this->telefono = $telefono;
  }
  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function setIdJuradoPopular($idJuradoPopular) {
    $this->idJuradoPopular = $idJuradoPopular;
  }

  public function setTipo($tipo) {
    $this->tipo = $tipo;
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
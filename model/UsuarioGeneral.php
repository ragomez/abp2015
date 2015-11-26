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
class UsuarioGeneral {

  
  private $login;
  private $passwd;
  private $tipo;
  
  /**
   * The constructor
   * 
   * @param string $username The name of the user
   * @param string $passwd The passwd of the user
   */
  public function __construct($login=NULL,$passwd=NULL, $tipo=NULL) {
    $this->login = $login;
    $this->passwd = $passwd; 
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

  public function getpasswd() {
    return $this->passwd;
  } 

  public function getTipo(){
    return $this->tipo;
  }

  //setters
 
  public function setLoginUsuario($login) {
    $this->login = $login;
  }   
  public function setpasswdUsuario($passwd) {
    $this->passwd = $passwd;
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
	$errors["login"] = "Username must be at least 5 characters length";
	
      }
      if (strlen($this->passwd) < 5) {
	$errors["passwd"] = "passwd must be at least 5 characters length";	
      }
      if (sizeof($errors)>0){
	throw new ValidationException($errors, "user is not valid");
      }
  } 
}
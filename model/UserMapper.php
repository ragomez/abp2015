<?php
// file: model/UserMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

/**
 * Class UserMapper
 *
 * Database interface for User entities
 * 
 *Tareas :
 *  -Nada
 *Tareas realizadas:
 * - Correcion en llamadas a sentencias SQL (usuarios, juradoPopular, establecimiento)
 */
class UserMapper {

  /**
   * Reference to the PDO connection
   * @var PDO
   */
  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

  /**
   * Saves a User into the database
   * 
   * @param User $user The user to be saved
   * @throws PDOException if a database error occurs
   * @return void
   */      
  public function save($user) {
    if($user->getTipo() == "Jurado popular"){
      $stmt = $this->db->prepare("INSERT INTO juradopopular values (?,?,?,?,?,?,?,?,?)");
      $stmt->execute(array($user->getIdJuradoPopular(),$user->getlogin(),$user->getPasswd(),$user->getDni(),$user->getName(),
        $user->getApellidos(),$user->getMail(),$user->getTelefono(),$user->getTipo()));    
    }
   if($user->getTipo() == "Jurado profesional"){
      $stmt = $this->db->prepare("INSERT INTO juradoProfesional values (?,?,?,?,?,?,?,?,?)");
      $stmt->execute(array($user->getIdJuradoProfesional(),$user->getlogin(),$user->getPasswd(),$user->getDni(),$user->getName(),
        $user->getApellidos(),$user->getMail(),$user->getTelefono(),$user->getTipo()));    
    }
   
    // idEstablecimiento, cif,nombre,direccion,horario,paginaWeb,telefono,Pincho_idPincho, tipo
    if($user->getTipo() == "Establecimiento"){
      $stmt = $this->db->prepare("INSERT INTO establecimiento values (?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->execute(array($user->getIdEstablecimiento(),$user->getlogin(),$user->getPasswd(),$user->getCif(),$user->getNombre(),
        $user->getDireccion(),$user->getHorario(),$user->getPaginaWeb(),$user->getTelefono(),$user->getPincho_idPincho(),$user->getTipo()));  
    }

   
    $usuarioGeneral = $this->db->prepare("INSERT INTO usuarios values (?,?,?)");
    $usuarioGeneral->execute(array($user->getlogin(),$user->getPasswd(),$user->getTipo()));    

   
  }
  
  /**
   * Checks if a given username is already in the database
   * 
   * @param string $username the username to check
   * @return boolean true if the username exists, false otherwise
   */
  public function usernameExists($login) {
    $stmt = $this->db->prepare("SELECT count(loginUsuario) FROM usuarios where loginUsuario=?");
    $stmt->execute(array($login));
    
    if ($stmt->fetchColumn() > 0) {   
      return true;
    } 
  }
  
  /**
   * Checks if a given pair of username/password exists in the database
   * 
   * @param string $username the username
   * @param string $passwd the password
   * @return boolean true the username/passwrod exists, false otherwise.
   */
  public function isValidUser($login, $passwd) {
    $stmt = $this->db->prepare("SELECT count(loginUsuario) FROM usuarios where loginUsuario=? and passwordUsuario=?");
    $stmt->execute(array($login, $passwd));
  
    if ($stmt->fetchColumn() > 0) {
      return true;        
    }
  }
  
}
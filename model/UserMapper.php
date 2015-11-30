<?php
// file: model/UserMapper.php

require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../model/UserEstablecimiento.php");
/**
 * Class UserMapper
 *
 * Database interface for User entities
 * 
 * @author lipido <lipido@gmail.com>
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
      $stmt = $this->db->prepare("INSERT INTO juradopopular(login, password, mail, nombre, apellidos, dni, telefono, tipo) values (?,?,?,?,?,?,?,?)");
      $stmt->execute(array($user->getlogin(),$user->getPasswd(),$user->getMail(),$user->getName(),
        $user->getApellidos(),$user->getDni(),$user->getTelefono(),$user->getTipo()));    
    }
    // idEstablecimiento, cif,nombre,direccion,horario,paginaWeb,telefono,Pincho_idPincho, tipo
    if($user->getTipo() == "Establecimiento"){
      $stmt = $this->db->prepare("INSERT INTO establecimiento(login,password,cif,nombreEstablecimiento,direccion,horario,paginaWeb,telefono,Pincho_idPincho, tipo) values (?,?,?,?,?,?,?,?,?,?)");
      $stmt->execute(array($user->getlogin(),$user->getPasswd(),$user->getCif(),$user->getNombre(),
        $user->getDireccion(),$user->getHorario(),$user->getPaginaWeb(),$user->getTelefono(),1,$user->getTipo()));  
    }

    $usuarioGeneral = $this->db->prepare("INSERT INTO usuario values (?,?,?)");
    $usuarioGeneral->execute(array($user->getlogin(),$user->getPasswd(),$user->getTipo()));    

   
  }
  
  /**
   * Checks if a given username is already in the database
   * 
   * @param string $username the username to check
   * @return boolean true if the username exists, false otherwise
   */
  public function usernameExists($login) {
    $stmt = $this->db->prepare("SELECT count(login) FROM usuario where login=?");
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
    $stmt = $this->db->prepare("SELECT count(login) FROM usuario where login=? and password=?");
    $stmt->execute(array($login, $passwd));  
    $usur = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!sizeof($usur) == 0) {
        return true;
    } 

  }



  public function buscarPorLogin($login){
    $stmt = $this->db->prepare("SELECT * FROM usuario WHERE login=?");
    $stmt->execute(array($login));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!sizeof($user) == 0) {
      return new UsuarioGeneral(
      $user["login"],      
      $user["password"],
      $user["tipo"]);
    } else {
      return NULL;
    }
  }


//idEstablecimiento, login, passwd, cif,nombre,direccion,horario,paginaWeb,telefono,Pincho_idPincho, tipo
  public function buscarEstablecimiento($login){ //hago esta sql para poder saccar el idPincho relacionado con el establecieminto para poder buscar el pincho luego
    $stmt = $this->db->prepare("SELECT * FROM establecimiento WHERE login=?");
    $stmt->execute(array($login));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!sizeof($user) == 0) {
      return new Establecimiento(
      $user["idEstablecimiento"],      
      $user["login"],
      $user["password"],
      $user["cif"],
      $user["nombreEstablecimiento"],
      $user["direccion"],
      $user["horario"],
      $user["paginaWeb"],
      $user["telefono"],
      $user["Pincho_idPincho"],
      $user["tipo"]);
    } else {
      return NULL;
    }
  }
    

  public function buscarJuradoPopular($login){
    $stmt = $this->db->prepare("SELECT * FROM juradopopular WHERE login=?");
    $stmt->execute(array($login));
    $jurado = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!sizeof($jurado) == 0) {
      return new user(
      
      $jurado["login"],  
      $jurado["password"],   
      $jurado["mail"],  
      $jurado["apellidos"],  
      $jurado["dni"], 
      $jurado["telefono"], 
      $jurado["tipo"]);
    } else {
      return NULL;
    }

}
  public function findAllEstablecimientos(){
      $stmt = $this->db->prepare("SELECT * FROM establecimiento");
      $estab_array= $stmt->fetchAll(PDO::FETCH_ASSOC);

      $listaEstablecimientos= array();

      foreach ($estab_array as $establecimiento) {
        array_push($listaEstablecimientos, new Establecimiento( 
         $establecimiento["idEstablecimiento"],
         $establecimiento["login"],
           $establecimiento["password"],
           $establecimiento["cif"],
           $establecimiento["nombreEstablecimiento"],
           $establecimiento["direccion"],
           $establecimiento["horario"],
           $establecimiento["paginaWeb"],
           $establecimiento["telefono"],
           $establecimiento["Pincho_idPincho"],
           $establecimiento["tipo"]));
      }

      return $listaEstablecimientos;
    }

 
}
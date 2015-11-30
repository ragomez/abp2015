<?php
// file: model/CodigoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../model/codigo.php");
require_once(__DIR__."/../model/codigoMapper.php");
class CodigoMapper {

  private $db;

  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

 

  public function buscarPinchoPorCodigo($codigo) {
    $stmt = $this->db->prepare("SELECT * FROM codigo WHERE codigoVotacion=? and codigoEstado=0");
    $stmt->execute(array($codigo));
    $code = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!sizeof($code) == 0) {
      return new Codigo(
        $code["idCodigo"],
        $code["codigoVotacion"],
        $code["Pincho_idPincho"],        
        $code["codigoEstado"]);
    }else {
      return NULL;
    }
  }


  // para meter el codigo que genera el establecimiento de su pincho y aqui se guarda en la tabla codigo
  public function addCodigoGenerado(Codigo $cod){

  
    $stmt = $this->db->prepare("INSERT INTO codigo ( codigoVotacion,Pincho_idPincho, codigoEstado) values (?,?,?)");
    $stmt->execute(array($cod->getCodigoVotacion(),$cod->getPincho_idPincho(),$cod->getCodigoEstado()));
  }
  


 
}




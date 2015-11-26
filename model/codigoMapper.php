<?php
// file: model/CodigoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

class CodigoMapper {

  private $db;

  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

 

   public function buscarPinchoPorCodigo($codigo) {
    $stmt = $this->db->prepare("SELECT * FROM Codigo WHERE codigoVotacion=? and codigoEstado=0");
    $stmt->execute(array($codigo));
    $code = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!sizeof($code) == 0) {
      return new Codigo(
        $code["idCodigo"],
        $code["codigoVotacion"],
        $code["codigoEstado"],        
        $code["Pincho_idPincho"]);
    }else {
      return NULL;
    }
  }


 
}




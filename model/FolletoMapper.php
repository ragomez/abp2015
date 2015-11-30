<?php
// file: model/FolletoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../model/Folleto.php");


class FolletoMapper {

  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }
 
 //Todos los folletos

  public function findAll() {   
    $stmt = $this->db->query("SELECT * FROM folleto");    
    $folleto_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $listaFolletos = array();
    
    foreach ($folleto_array as $folleto) {     
          
      array_push($listaFolletos, new Folleto(
        $folleto["idFolleto"],
        $folleto["titulo"],
        $folleto["descripcion"],
        $folleto["fechaInicio"],
        $folleto["fechaFin"],
        $folleto["Administrador_idAdministrador"]));
    }   
    return $listaFolletos;
  }
  
  //Cargar folleto

  public function findById($titulo){
    $stmt = $this->db->prepare("SELECT * FROM folleto WHERE titulo=?");
    $stmt->execute(array($titulo));
    $folleto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!sizeof($folleto) == 0) {
      return new Folleto(   
        $folleto["titulo"],
        $folleto["descripcion"],
        $folleto["fechaInicio"],
        $folleto["fechaFin"],
        $folleto["Administrador_idAdministrador"]);
    } else {
      return NULL;
    }   
  }
  
  //Guardar folleto   
  public function save(Folleto $folleto) {
    $stmt = $this->db->prepare("INSERT INTO folleto(titulo, descripcion, fechaInicio, fechaFin, Administrador_idAdministrador)
                              values (?,?,?,?,?)");
    $stmt->execute(array( $folleto->getTitulo(),
                        $folleto->getDescripcion(), $folleto->getFechaInicio(), $folleto->getFechaFin(),
                        $folleto->getAdministrador_idAdministrador()));    
  }

  //Actualizar folleto
 public function update(Folleto $folleto) {
    $stmt = $this->db->prepare("UPDATE folleto set idFolleto=?, titulo=? ,descripcion=?, fechaInicio=?, fechaFin=?, administrador_idAdministrador =? where id=?");
    $stmt->execute(array($folleto->getIdFolleto(), $folleto->getTitulo(), $folleto->getDescripcion(), $folleto->getFechaInicio(), $folleto->getFechaFin(),$folleto->getAdministrador_idAdministrador()));
  }

  //Eliminar folleto

  public function delete(Folleto $folleto) {
    $stmt = $this->db->prepare("DELETE from folleto WHERE idFolleto=?");
    $stmt->execute(array($folleto->getIdFolleto()));    
  }

      public function folletoExists($titulo) {
    $stmt = $this->db->prepare("SELECT count(titulo) FROM folleto where titulo=?");
    $stmt->execute(array($titulo));
    
    if ($stmt->fetchColumn() > 0) {   
      return true;
    } 
  }


  
}





?>

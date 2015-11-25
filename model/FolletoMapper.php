<?php

// file: model/FolletoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../model/Folleto.php");
require_once(__DIR__."/../model/Administrador.php");

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
        $folleto["administrador_idAdministrador"]);
    }   
    return $listaFolletos;
  }
  
  //Cargar folleto

  public function findById($idFolleto){
    $stmt = $this->db->prepare("SELECT * FROM folleto WHERE idFolleto=?");
    $stmt->execute(array($idFolleto));
    $folleto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!sizeof($folleto) == 0) {
      return new Folleto(
        $folleto["idFolleto"],
        $folleto["titulo"],
        $folleto["descripcion"],
        $folleto["fechaInicio"],
        $folleto["fechaFin"]
        $folleto["administrador_idAdministrador"]);
    } else {
      return NULL;
    }   
  }
  
  //Guardar folleto   
  public function save(Folleto $folleto) {
    $stmt = $this->db->prepare("INSERT INTO folleto(idFolleto, titulo, descripcion, fechaInicio, fechaFin, administrador_idAdministrador)
                              values (?,?,?,?,?,?)");
    $stmt->execute(array($folleto->getIdFolleto(), $folleto->getTitulo(),
                        $folleto->getDescripcion(), $folleto->getFechaInicio(), $folleto->getFechaFin(),
                        $folleto->getAdministrador_idAdministrador());    
  }

  //Actualizar folleto
  public function update(Folleto $folleto) {
    $stmt = $this->db->prepare("UPDATE folleto set idFolleto=?, titulo=? ,
                              descripcion=?, fechaInicio=?, fechaFin=?,
                              administrador_idAdministrador =?, where id=?");
    $stmt->execute(array($folleto->getIdFolleto(), $folleto->getTitulo(), $folleto->getDescripcion(), $folleto->getFechaInicio(), $folleto->getFechaFin(),
                        $folleto->getAdministrador_idAdministrador());
  }

  //Eliminar folleto

  public function delete(Folleto $folleto) {
    $stmt = $this->db->prepare("DELETE from folleto WHERE idFolleto=?");
    $stmt->execute(array($folleto->getIdFolleto()));    
  }
  
}

?>

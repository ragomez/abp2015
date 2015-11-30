<?php
// file: model/PostMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/Patrocinador.php");

class PatrocinadorMapper {

  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

   
  public function findAll() {   
    $stmt = $this->db->query("SELECT * FROM patrocinador");    
    $patrocinadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $listaPatrocinadores = array();
    
    foreach ($patrocinadores as $patrocinador) {
     
          
      array_push($listaPatrocinadores, new Patrocinador(
        $patrocinador["idPatrocinador"],
        $patrocinador["nombrePatrocinador"],
        $patrocinador["importe"],
        $patrocinador["telefonoPatrocinador"]
        ));
    }   

    return $listaPatrocinadores;
  }
  
    
  public function findByName($nombrePatrocinador){
    $stmt = $this->db->prepare("SELECT * FROM patrocinador WHERE nombrePatrocinador=?");
    $stmt->execute(array($nombrePatrocinador));
    $patrocinador = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!sizeof($patrocinador) == 0) 
    {
      return new Patrocinador(
        $patrocinador["idPatrocinador"],
        $patrocinador["nombrePatrocinador"],
        $patrocinador["importe"],
        $patrocinador["telefonoPatrocinador"]
        );
    } 
    else 
    {
      return NULL;
    }   
  }

  public function save(Patrocinador $patrocinador) {
    $stmt = $this->db->prepare("INSERT INTO patrocinador(nombrePatrocinador,importe,
                                            telefonoPatrocinador)
                              values (?,?,?)");
    $stmt->execute(array($patrocinador->getNombrePatrocinador(),
                        $patrocinador->getImporte(), $patrocinador->gettelefonoPatrocinador()));    
  }
    
  public function update(Premio $patrocinador) {
    $stmt = $this->db->prepare("UPDATE patrocinador set  nombrePatrocinador=? ,
                              importe=?, telefonoPatrocinador=?");

   $stmt->execute(array($patrocinador->getNombrePatrocinador(),
                        $patrocinador->getImporte(), $patrocinador->gettelefonoPatrocinador()));
  }
  
  public function delete(Premio $premio) {
    $stmt = $this->db->prepare("DELETE from patrocinador WHERE nombrePremio=?");
    $stmt->execute(array($patrocinador->getNombrePatrocinador()));    
  }
  
}

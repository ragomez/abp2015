<?php
// file: model/PostMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Pincho.php");


/**
 * Class PostMapper
 *
 * Database interface for Post entities
 * 
 * @author lipido <lipido@gmail.com>
 */
class PinchoMapper {

  /**
   * Reference to the PDO connection
   * @var PDO
   */
  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

  /**
   * @throws PDOException if a database error occurs
   * @return lista de TODOS los pinchos del sistema ordenador por establecimiento
   */  
  public function pinchosValidados() {   
    $stmt = $this->db->query("SELECT * FROM pincho where estado = 1 ");    
    $pincho_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $listaPinchos = array();
    
    foreach ($pincho_array as $pincho) {
     // $establecimiento = new Establecimiento($pincho["idEstablecimiento"]);
      array_push($listaPinchos, new Pincho($pincho["idPincho"],$pincho["nombrePincho"],
        $pincho["descripcion"], $pincho["precio"], $pincho["celiaco"], $pincho["estado"], 
        $pincho["ganadorPopular"], $pincho["ganadorProfesional"], $pincho["puntosPopular"],
        $pincho["mediaPuntosProfesional"], $pincho["imagen"]));
    }   

    return $listaPinchos;
  }


  public function pinchosNoValidados() {   
    $stmt = $this->db->query("SELECT * FROM pincho where estado = 0 ");    
    $pincho_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $listaPinchos = array();
    
    foreach ($pincho_array as $pincho) {
     // $establecimiento = new Establecimiento($pincho["idEstablecimiento"]);
      array_push($listaPinchos, new Pincho($pincho["idPincho"],$pincho["nombrePincho"],
        $pincho["descripcion"], $pincho["precio"], $pincho["celiaco"], $pincho["estado"], 
        $pincho["ganadorPopular"], $pincho["ganadorProfesional"], $pincho["puntosPopular"],
        $pincho["mediaPuntosProfesional"], $pincho["imagen"]));
    }   

    return $listaPinchos;
  }
  
  /**
   * Loads a Post from the database given its id
   * 
   * Note: Comments are not added to the Post
   *
   * @throws PDOException if a database error occurs
   * @return Post The Post instances (without comments). NULL 
   * if the Post is not found
   */    
  public function findById($idPincho){
    $stmt = $this->db->prepare("SELECT * FROM pincho WHERE idPincho=?");
    $stmt->execute(array($idPincho));
    $pincho = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!sizeof($pincho) == 0) {
        return new pincho(
        	$pincho["idPincho"],
          $pincho["nombrePincho"],
        	$pincho["descripcion"],
        	$pincho["precio"],
          $pincho["celiaco"], 
          $pincho["estado"],
          $pincho["ganadorPopular"], 
          $pincho["ganadorProfesional"], 
          $pincho["puntosPopular"],
          $pincho["mediaPuntosProfesional"],
          $pincho["imagen"]);
    } else {
      return NULL;
    }   
  }

  /**
   * Saves a Post into the database
   * 
   * @param Post $post The post to be saved
   * @throws PDOException if a database error occurs
   * @return void
   */    
  public function save(Pincho $pincho) {
    $stmt = $this->db->prepare("INSERT INTO pincho(nombrePincho, descripcion, precio, celiaco, imagen) values (?,?,?,?,?)");
    $stmt->execute(array($pincho->getNombrePincho(), $pincho->getDescripcionPincho(), $pincho->getPrecio(), $pincho->getCeliaco(), $pincho->getImagen()));    
  }

  /**
   * Updates a Post in the database
   * 
   * @param Post $post The post to be updated
   * @throws PDOException if a database error occurs
   * @return void
   */     
  public function update(Pincho $pincho) {
    $stmt = $this->db->prepare("UPDATE pincho set nombrePincho=?, descripcion=? , precio=?, celiaco=?, where id=?");
    $stmt->execute(array($pincho->getNombrePincho(), $pincho->getDescripcionPincho(), $pincho->getPrecio(), $pincho->getCeliaco(), $pincho->getImagen())); 
  }

  public function validaPincho($id) {///funcion admin apra validar pincho
    $stmt = $this->db->prepare("UPDATE pincho set estado=1 where idPincho=?");
    $stmt->execute(array($id)); 
  }

  /**
   * Deletes a Post into the database
   * 
   * @param Post $post The post to be deleted
   * @throws PDOException if a database error occurs
   * @return void
   */   
  public function delete(Pincho $pincho) {
    $stmt = $this->db->prepare("DELETE from pincho WHERE idPincho=?");
    $stmt->execute(array($pincho->getIdPincho()));    
  }


  public function votar($idPincho) {
    $stmt = $this->db->prepare("UPDATE pincho set  puntosPopular=(puntosPopular+1) where idPincho=?");
    $stmt->execute(array($idPincho)); 



    $stmt = $this->db->prepare("UPDATE codigo set codigoEstado=1 where Pincho_idPincho=?");
      $stmt->execute(array($idPincho));

  }

   
}
/* public function actualizacion($codigo)
  {

      $stmt = $this->db->prepare("UPDATE Codigo set usado=1 where codigoVotacion=?");
      $stmt->execute(array($codigo));

  }
*/
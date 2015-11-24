<?php
// file: model/PostMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/Premio.php");
require_once(__DIR__."/../model/Patrocinador.php");

/**
 * Class PremioMapper
 *
 * Database interface for Premio entities
 * 
 *Tareas Pendientes:
 * - Ver dependencia da taboa de patrocinadores.
 *Tareas realizadas:
 * - Inlcuidas funcions findAll(), findById() , save(), delete() e update().
 */
class PremioMapper {

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
   * @return lista de TODOS los premios del sistema 
   */  
  public function findAll() {   
    $stmt = $this->db->query("SELECT * FROM premio");    
    $premio_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $listaPremios = array();
    
    foreach ($premio_array as $premio) {
     
          
      array_push($listaPremios, new Premio(
        $premio["idPremio"],
        $premio["importePopular"],
        $premio["importeProfesional"],
        $premio["fechaPremio"],
        $premio["Patrocinador_idPatrocinador"]);
    }   

    return $listaPremios;
  }
  
  /**
   * Loads a Premio from the database given its id
   * 
   *
   * @throws PDOException if a database error occurs
   * @return - Premio The Premio instances (without comments).  
   *         - NULL if the Premio is not found
   */    
  public function findById($idPremio){
    $stmt = $this->db->prepare("SELECT * FROM premio WHERE idPremio=?");
    $stmt->execute(array($idPremio));
    $premio = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!sizeof($premio) == 0) {
      return new Premio(
        $premio["idPremio"],
        $premio["importePopular"],
        $premio["importeProfesional"],
        $premio["fechaPremio"],
        $premio["Patrocinador_idPatrocinador"]);
    } else {
      return NULL;
    }   
  }

  /**
   * Saves a Premio into the database
   * 
   * @param Premio $premio The premio to be saved
   * @throws PDOException if a database error occurs
   * @return void
   */    
  public function save(Premio $premio) {
    $stmt = $this->db->prepare("INSERT INTO premio(idPremio,importePopular,
                                 importeProfesional, fechaPremio, Patrocinador_idPatrocinador)
                                  values (?,?,?,?,?)");
    $stmt->execute(array($premio->getIdPremio(), $premio->getImportePopular(),
                        $premio->getImporteProfesional(), $premio->getFechaPremio(),
                        $premio->getPatrocinador_idPatrocinador());    
  }

  /**
   * Updates a Premio in the database
   * 
   * @param Premio $premio The premio to be updated
   * @throws PDOException if a database error occurs
   * @return void
   */     
  public function update(Premio $premio) {
    $stmt = $this->db->prepare("UPDATE premio set idPremio=?, importePopular=? ,
                               importeProfesional=?, fechaPremio=?, Patrocinador_idPatrocinador =?, where id=?");
    $stmt->execute(array($premio->getIdPremio(), $premio->getImportePopular(),
                        $premio->getImporteProfesional(), $premio->getFechaPremio(),
                        $premio->getPatrocinador_idPatrocinador());
  }

  /**
   * Deletes a Premio into the database
   * 
   * @param Premio $premio The premio to be deleted
   * @throws PDOException if a database error occurs
   * @return void
   */   
  public function delete(Premio $premio) {
    $stmt = $this->db->prepare("DELETE from premio WHERE idPremio=?");
    $stmt->execute(array($premio->getIdPremio()));    
  }
  
}

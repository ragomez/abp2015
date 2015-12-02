<?php

require_once(__DIR__."/../core/ValidationException.php");

class Premio{



	private $idPremio;
  private $nombrePremio;
	private	$importePopular;
	private $importeProfesional;
	private $fechaPremio;
	private $patrocinador_idPatrocinador;



	public function __construct($idPremio=NULL,$importePopular=NULL, $importeProfesional=NULL,
                     $fechaPremio = NULL, $patrocinador_idPatrocinador = NULL, $nombrePremio=NULL ) {
	    $this->idPremio = $idPremio;
      $this->nombrePremio = $nombrePremio;
	    $this->importePopular = $importePopular;
	    $this->importeProfesional = $importeProfesional;
	    $this->fechaPremio = $fechaPremio;
	    $this->patrocinador_idPatrocinador = $patrocinador_idPatrocinador;  
  	}


  	public function getIdPremio() {
    	return $this->idPremio;
  	}

    public function getNombrePremio(){
      return $this->nombrePremio;
    }
  

  	public function getImportePopular() {
    	return $this->importePopular;
  	}
  

  	public function getImporteProfesional() {
    	return $this->importeProfesional;
  	}
  

  	public function getFechaPremio() {
    	return $this->fechaPremio;
  	}
  

  	public function getPatrocinador_idPatrocinador() {
    	return $this->patrocinador_idPatrocinador;
  	}
    
	
    /* ID controlada por BBDD 
	 public function setIdPremio($idPremio) {
    	$this->idPremio = $idPremio;
  	}
    */
     public function setIdPremio($idPremio){
      $this->idPremio = $idPremio;
    }
    public function setNombrePremio($nombrePremio){
      $this->nombrePremio = $nombrePremio;
    }

  	public function setImportePopular($importePopular) {
    	$this->importePopular = $importePopular;
  	}

  	public function setImporteProfesional($importeProfesional) {
    	$this->importeProfesional = $importeProfesional;
  	}

  	public function setFechaPremio($fechaPremio) {
    	$this->fechaPremio = $fechaPremio;
  	}

  	public function setPatrocinador_idPatrocinador($patrocinador_idPatrocinador) {
    	$this->patrocinador_idPatrocinador = $patrocinador_idPatrocinador;
  	}
 


  	public function checkIsValidForCreate() 
    {
    	$errors = array();
      
	    if ((strlen(trim($this->importePopular)) == 0 ) && 
          (strlen(trim($this->importeProfesional)) == 0 )) 
      {
			$errors["importePopular"] = "Un premio es obligatorio";
      $errors["importeProfesional"] = "Un premio es obligatorio";
	    }

	    if ($this->fechaPremio == 0 )
      {
			$errors["fechaPremio"] = "La fecha del premio es obligatoria";
	    }

      if ($this->nombrePremio == NULL )
      {
      $errors["nombrePremio"] = "El nombre del premio  es obligatorio";
      }

	    if (sizeof($errors) > 0)
      {
			throw new ValidationException($errors, "Premio is not valid");
	    }
  	}

  public function checkIsValidForUpdate() {
    $errors = array();
    
    
    
    try{
      $this->checkIsValidForCreate();
    }catch(ValidationException $ex) {
      foreach ($ex->getErrors() as $key=>$error) {
  $errors[$key] = $error;
      }
    }    
    if (sizeof($errors) > 0) {
      throw new ValidationException($errors, "Premio no valido. Introduzca uno correcto.");
    }
  }

}
?>
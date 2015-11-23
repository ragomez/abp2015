


<?php


Class Premio{



	private $idPremio;
	private	$importePopular;
	private $importeProfesional;
	private $fechaPremio;
	private $Patrocinador_idPatrocinador;



	public function __construct($idPremio=NULL, $importePopular=NULL, $importeProfesional=NULL,
                     $fechaPremio = NULL, $Patrocinador_idPatrocinador = NULL) {
	    $this->idPremio = $idPremio;
	    $this->importePopular = $importePopular;
	    $this->importeProfesional = $importeProfesional;
	    $this->fechaPremio = $fechaPremio;
	    $this->Patrocinador_idPatrocinador = $Patrocinador_idPatrocinador;  
  	}


  	public function getIdPremio() {
    	return $this->idPremio;
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
    	return $this->Patrocinador_idPatrocinador;
  	}
    
	

	public function setIdPremio($idPremio) {
    	$this->idPremio = $idPremio;
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

  	public function setPatrocinador_idPatrocinador($Patrocinador_idPatrocinador) {
    	$this->Patrocinador_idPatrocinador = $Patrocinador_idPatrocinador;
  	}
 


  	public function checkIsValidForCreate() {
    	$errors = array();
     	if (strlen(trim($this->idPremio)) == 0 ) {
			$errors["idPremio"] = "El idPremio es obligatorio";
	     }
	    if ((strlen(trim($this->importePopular)) == 0 ) && (strlen(trim($this->importeProfesional)) == 0 )) {
			$errors["importePopular"] = "Un premio es obligatorio";
      $errors["importeProfesional"] = "Un premio es obligatorio";
	    }
      
	    if ($this->fechaPremio == 0 ) {
			$errors["fechaPremio"] = "La fecha del premio es obligatoria";
	    }
      if ($this->Patrocinador_idPatrocinador == 0 ) {
      $errors["Patrocinador_idPatrocinador"] = "La ID del patrocinador es obligatoria";
      }
	    if (sizeof($errors) > 0){
			throw new ValidationException($errors, "post is not valid");
	    }
  	}



}



?>
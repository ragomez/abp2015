


<?php


Class JuradoProfesional{



	private $idBD;
	private	$dni;
	private $telefono;
	private $nombre;
	private $apellidos;
	private $login;
	private $password;



	public function __construct($idBD=NULL, $dni=NULL, $telefono=NULL, $nombre = NULL, $apellidos = NULL) {
	    $this->idBD = $idBD;
	    $this->dni = $dni;
	    $this->telefono = $telefono;
	    $this->nombre = $nombre;
	    $this->apellidos = $apellidos;    
  	}


  	public function getIdBD() {
    	return $this->idBD;
  	}
  

  	public function getDni() {
    	return $this->dni;
  	}
  

  	public function getTelefono() {
    	return $this->telefono;
  	}
  

  	public function getNombre() {
    	return $this->nombre;
  	}
  

  	public function getApellidos() {
    	return $this->apellidos;
  	}
  
	

	public function setIdBD($idBD) {
    	$this->idBD = $idBD;
  	}

  	public function setDni($dni) {
    	$this->dni = $dni;
  	}

  	public function setTelefono($telefono) {
    	$this->telefono = $telefono;
  	}

  	public function setNombre($nombre) {
    	$this->nombre = $nombre;
  	}

  	public function setApellido($apellido) {
    	$this->apellido = $apellido;
  	}




  	public function checkIsValidForCreate() {
    	$errors = array();
     	if (strlen(trim($this->title)) == 0 ) {
			$errors["title"] = "title is mandatory";
	     }
	    if (strlen(trim($this->content)) == 0 ) {
			$errors["content"] = "content is mandatory";
	    }
	    if ($this->author == NULL ) {
			$errors["author"] = "author is mandatory";
	    }
	    if (sizeof($errors) > 0){
			throw new ValidationException($errors, "post is not valid");
	    }
  	}



}



?>
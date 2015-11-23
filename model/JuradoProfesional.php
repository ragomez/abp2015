


<?php


Class JuradoProfesional{



	private $idJuradoProfesional;
	private	$dni;
	private $telefono;
	private $nombre;
	private $apellidos;
	private $login;
	private $password;



	public function __construct($idBD=NULL, $dni=NULL, $telefono=NULL,
                     $nombre = NULL, $apellidos = NULL, $login = NULL, $password = NULL) {
	    $this->idJuradoProfesional = $idJuradoProfesional;
	    $this->dni = $dni;
	    $this->telefono = $telefono;
	    $this->nombre = $nombre;
	    $this->apellidos = $apellidos; 
      $this->login = $login;
      $this->password = $password;   
  	}


  	public function getIdJuradoProfesional() {
    	return $this->idJuradoProfesional;
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
    
    public function getLogin(){
      return $this->login;
    }

    public function getPassword(){
      return $this->password;
    }
	

	public function setIdJuradoProfesional($idJuradoProfesional) {
    	$this->idJuradoProfesional = $idJuradoProfesional;
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
    public function setLogin($login){
      $this->login = $login;
    }
    public function setPassword($password){
      $this->password = $password;
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
<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/codigo.php");
require_once(__DIR__."/../model/codigoMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

class CodigoController extends BaseController {

  private $codigoMapper;

  public function __construct() {
    parent::__construct();

    $this->codigoMapper = new CodigoMapper;

    $this->view->setLayout("default");
  }




  public function validar()
  {
    if (isset($_POST["codigo1"]) && isset($_POST["codigo2"]) && isset($_POST["codigo3"]) ){


          $cod1 =  $this->codigoMapper->buscarPinchoPorCodigo($_POST["codigo1"]);
          $cod2 =  $this->codigoMapper->buscarPinchoPorCodigo($_POST["codigo2"]);
          $cod3 =  $this->codigoMapper->buscarPinchoPorCodigo($_POST["codigo3"]);

          if ($cod1->getPincho_idPincho() && $cod2->getPincho_idPincho() && $cod3->getPincho_idPincho() ) {
            //pincho numero 1
            /*print_r($cod1->getPincho_idPincho());
            echo "<br>";
            print_r($cod2->getPincho_idPincho());
            echo "<br>";
            print_r($cod3->getPincho_idPincho());
            echo "<br>";
            die();*/
            $idpincho1 = $cod1->getPincho_idPincho();
            $codigo1 = $cod1->getIdCodigo();

            // pincho numero 2
            $idpincho2 = $cod2->getPincho_idPincho();
            $codigo2 = $cod2->getIdCodigo();

            $idpincho3 = $cod3->getPincho_idPincho();
            $codigo3 = $cod3->getIdCodigo(); 

           /* print_r($codigo1);
            echo "<br>";
            print_r($codigo2);
            echo "<br>";
            print_r($codigo3);
            echo "<br>";
            die();*/

            $_SESSION["currentcod1"]=$idpincho1;
            $_SESSION["currentcod2"]=$idpincho2;
            $_SESSION["currentcod3"]=$idpincho3;
            
            $this->view->redirect("Pincho", "mostrarPincho");

          }else{
             $errors = array();
             $errors["general"] = "Codigos no válidos o caducado";
             $this->view->setVariable("errors", $errors);
          }
        }
        $this->view->render("pinchos", "votarFormularioPopular");
    }

}
?>
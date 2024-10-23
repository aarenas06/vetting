<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/perfilUser/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }

    public function ObtDataPerfil()
    {
        $data = $this->MODEL->ObtDataPerfil($_POST);
        echo json_encode($data);
    }

    public function UpdateDataPerfil()
    {
        $datos = $this->MODEL->UpdateDataPerfil($_POST);
        if ($datos == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }
}

$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

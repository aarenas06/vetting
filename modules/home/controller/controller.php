<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/home/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }

    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }

    public function listMascotashome()
    {
        $datos = $this->MODEL->listMascotashome($_POST);
        echo json_encode($datos);
    }
}

$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

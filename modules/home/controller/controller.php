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

    public function maps()
    {
        $datos = $this->MODEL->maps();
        echo json_encode($datos);
    }
    public function ListVetActive()
    {
        $datos = $this->MODEL->ListVetActive();
        if ($datos) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/home/layout/forVet.php');
        } else {
            echo 'No hay vet Disponibles';
        }
    }
}

$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

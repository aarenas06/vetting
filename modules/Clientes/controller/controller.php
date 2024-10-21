<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Clientes/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function InsertPropietarios()
    {
        $datos = $this->MODEL->InsertPropietarios($_POST);
        if (isset($datos)) {
            echo json_encode(true);
        } else {
            echo json_encode(true);
        }
    }
    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }

    public function listPropietarios()
    {
        $data = $this->MODEL->listPropietarios($_POST['Emp']);
        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Clientes/layout/listPropietarios.php');
        } else {
            echo 'No Hay Clientes Agregados...';
        }
    }

    public function GetDataPropietarios()
    {
        $data = $this->MODEL->GetDataPropietarios($_POST);
        echo json_encode($data);
    }

    public function UpdatePropietarios()
    {
        $datos = $this->MODEL->UpdatePropietarios($_POST);
        if (isset($datos)) {
            echo json_encode(true);
        } else {
            echo json_encode(true);
        }
    }

    public function DeletePropietarios()
    {
        $data = $this->MODEL->DeletePropietarios($_POST);
        echo json_encode($data);
    }
}
$controller = new Controller();
if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

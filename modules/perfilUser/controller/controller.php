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
        var_dump($data);
        echo json_encode($data);
    }


    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }
}

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
    // public function InsertPropietarios()
    // {
    //     $datos = $this->MODEL->InsertPropietarios($_POST);
    //     if (isset($datos)) {
    //         echo json_encode(true);
    //     } else {
    //         echo json_encode(true);
    //     }
    // }
}

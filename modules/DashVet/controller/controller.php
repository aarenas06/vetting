<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/DashVet/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function DataCita()
    {
        $dt = $this->MODEL->DataCita($_POST['id']);
        if ($dt) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/DashVet/layout/desarrollo.php');
        } else {
            echo 'No hay información';
        }
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

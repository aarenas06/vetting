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
    public function InsertHisto()
    {
        $MascoCod = $_POST['MascoCod'];
        $data = array(
            "idTbCitas" => $_POST['idTbCitas'],
            "HisObserv" => $_POST['HisObserv'],
            "idTbEmpleados " => $_POST['UsuCod'],
            "HisEst " => $_POST['HisEst'],
        );
        if (isset($_FILES['HisAdj']) && $_FILES['HisAdj']['error'] == UPLOAD_ERR_OK) {
            $rutaGuardar = $_SERVER['DOCUMENT_ROOT'] . "/vetting/asset/documentacion/empresa/historiasClinicas/$MascoCod/";
            if (!file_exists($rutaGuardar)) {
                mkdir($rutaGuardar, 0777, true);
            }
            $nuevoNombre = $this->getNombre(5) . '.pdf';

            $rutaArchivo = $rutaGuardar . $nuevoNombre;

            if (move_uploaded_file($_FILES['HisAdj']['tmp_name'], $rutaArchivo)) {
            }
            $data['HisAdj'] = $nuevoNombre;
        }

        $insert = $this->MODEL->InsertHisto($data);
        if ($insert) {
            $updateEst = $this->MODEL->Updatecita($_POST['idTbCitas']);
        }
    }
    private function getNombre($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

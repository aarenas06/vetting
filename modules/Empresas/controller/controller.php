<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Empresas/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function GetPlanes()
    {
        $data = $this->MODEL->GetPlanes();
        return $data;
    }
    public function InsertEmp()
    {
        $EmpreAdj = $_FILES['EmpreAdj']['name'];
        $EmpreContr = $_FILES['EmpreContr']['name'];
        $NombreCarpeta = $_POST['EmpreNom'];
        $rutaGuardar = $_SERVER['DOCUMENT_ROOT'] . "/vetting/asset/documentacion/contratos/$NombreCarpeta/";
        if (!file_exists($rutaGuardar)) {
            mkdir($rutaGuardar, 0777, true);
        }
        // Generar nuevos nombres para los archivos
        $nuevoNombreEmpreAdj = $this->getNombre(5) . '.pdf';
        $nuevoNombreEmpreContr = $this->getNombre(5) . '.pdf';
        // Rutas completas para guardar los archivos
        $rutaArchivoEmpreAdj = $rutaGuardar . $nuevoNombreEmpreAdj;
        $rutaArchivoEmpreContr = $rutaGuardar . $nuevoNombreEmpreContr;
        if (move_uploaded_file($_FILES['EmpreAdj']['tmp_name'], $rutaArchivoEmpreAdj)) {
        }
        if (move_uploaded_file($_FILES['EmpreContr']['tmp_name'], $rutaArchivoEmpreContr)) {
        }

        $data = array(
            "EmpreNom" => $_POST['EmpreNom'],
            "EmpreNit" => $_POST['EmpreNit'],
            "EmpreDir" => $_POST['EmpreDir'],
            "EmpreRepre" => $_POST['EmpreRepre'],
            "EmpreRepreCC" => $_POST['EmpreRepreCC'],
            "EmpreRepreTel" => $_POST['EmpreRepreTel'],
            "EmpreContr" => $nuevoNombreEmpreContr,
            "EmpreAdj" => $nuevoNombreEmpreAdj,
        );
        $lastId = $this->MODEL->InsertEmp($data);
        $dataPago = array(
            "UsuCod" => $_POST['UsuCod'],
            "idTbPlanes " => $_POST['PlanSelect'],
            "idTbEmpresas " => $lastId,
        );
        $this->MODEL->InsertHistoPago($dataPago);

        //crea UsuarioAdmin 
        $dataUsuario = array(
            "idTbEmpresas" => $lastId,
            "idTbRoles " => 3,
            "EmpNom" => $_POST['EmpreNom'] . '-Admin',
            "EmpCod" => '',
            "EmpUsu" => $_POST['EmpreNit'],
            "EmpCla" => $_POST['EmpreNit'],
            "EmpCel" => $_POST['EmpreRepreTel'],
            "EmpEst" => 1,
            "EmpEmail" => $_POST['EmpreEmail'],
        );
        $this->MODEL->InsertUserAdmin($dataUsuario);
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
    public function listEmpresa()
    {
        $data = $this->MODEL->listEmpresa();
        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Empresas/layout/listEmpresa.php');
        } else {
            echo 'No Hay Empresas Aún Creadas';
        }
    }
    public function ChangeEstEmp()
    {
        if ($_POST['Est'] == 1) {
            $new = 2;
        } else {
            $new = 1;
        }
        $update = $this->MODEL->ChangeEstEmp($_POST['IdEmp'], $new);
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

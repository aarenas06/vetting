<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Mascotas/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function InsertPlan()
    {
        $arr = array(
            "PlanNom" => $_POST['PlanNom'],
            "PlanVigenciaDia" => $_POST['PlanVigenciaDia'],
            "PlanCosto" => $_POST['PlanCosto'],
            "PlanVigenciaMes" => $_POST['PlanVigenciaMes'],
        );
        $IdReg = $this->MODEL->InsertPlan($arr);
        $opt = $_POST['selectedServices'];

        // Decodificar la cadena JSON en un array
        $optArray = json_decode($opt, true);

        if (is_array($optArray)) {
            foreach ($optArray as $op) {
                $arre = array(
                    "idTbServicios" => $op,
                    "idTbPlanes" => $IdReg
                );
                $this->MODEL->InsertPlanServices($arre);
            }
        }
        echo json_encode(true);
    }
    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }
    public function listPlanes()
    {
        $data = $this->MODEL->listPlanes();
        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Planes/layout/listPlanes.php');
        } else {
            echo 'No Hay Planes Aún Creados';
        }
    }
    public function tbdetalle()
    {
        $idPlan = $_POST['idPlan'];
        $data = $this->MODEL->tbdetalle($idPlan);
        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Planes/layout/tbDetalle.php');
        } else {
            echo 'No Hay Planes Aún Creados';
        }
    }
    public function ChangeEst()
    {
        if ($_POST['Est'] == 1) {
            $new = 2;
        } else {
            $new = 1;
        }
        $update = $this->MODEL->ChangeEst($_POST['idPlan'], $_POST['idServicio'], $new);
    }
    public function ChangeEstPlan()
    {
        if ($_POST['Est'] == 1) {
            $new = 2;
        } else {
            $new = 1;
        }
        $update = $this->MODEL->ChangeEstPlan($_POST['idPlan'], $new);
    }
    public function listData()
    {
        $idPlan = $_POST['idPlan'];
        $data = $this->MODEL->listData($idPlan);
        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Planes/layout/ListData.php');
        } else {
            echo 'No Hay Planes Aún Creados';
        }
    }
    public function UpdatePlan()
    {
        $UpdatePlan = $this->MODEL->UpdatePlan($_POST['idPlan'], $_POST['PlanNom'], $_POST['PlanVigenciaDia'], $_POST['PlanCosto'], $_POST['PlanVigenciaMes']);
    }
    public function InsertEmp()
    {
        print_r($_POST);
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

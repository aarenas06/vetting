<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Dashboard/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }

    public function Grafic1()
    {
        $FechIni = $_POST['FechIni'];
        $FechFin = $_POST['FechFin'];
        $Emp = $_POST['Emp'];

        $ListCitasEjec = $this->MODEL->ListCitasEjec($Emp, $FechIni, $FechFin);
        $ListCitasPro = $this->MODEL->ListCitasPro($Emp, $FechIni, $FechFin);
        $ListCitasRe = $this->MODEL->ListCitasRe($Emp, $FechIni, $FechFin);

        $result = array(
            "Eje" => $ListCitasEjec,
            "Agen" => $ListCitasPro,
            "Recha" => $ListCitasRe,
        );
        echo json_encode($result);
    }
    public function Grafic2()
    {
        $FechIni = $_POST['FechIni'];
        $FechFin = $_POST['FechFin'];
        $Emp = $_POST['Emp'];
        $Reg = $this->MODEL->ListEmpReg($Emp, $FechIni, $FechFin);
        $Eje = $this->MODEL->ListEmpEje($Emp, $FechIni, $FechFin);

        $result = array(
            "Reg" => $Reg,
            "Eje" => $Eje,
        );
        echo json_encode($result);
    }
    public function Grafic3()
    {
        $FechIni = $_POST['FechIni'];
        $FechFin = $_POST['FechFin'];
        $Emp = $_POST['Emp'];
        $data = $this->MODEL->tablaTotal($Emp, $FechIni, $FechFin);
        include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/dashboard/layout/tablaTotal.php');
    }
    public function Grafico4()
    {
        $FechIni = $_POST['FechIni'];
        $FechFin = $_POST['FechFin'];
        $Emp = $_POST['Emp'];
        $data = $this->MODEL->Grafico4($Emp, $FechIni, $FechFin);
        echo json_encode($data);
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

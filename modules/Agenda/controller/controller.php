<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Agenda/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function GetMasco()
    {
        $MacoCod = $_POST['MacoCod'];
        $data = $this->MODEL->GetMasco($MacoCod);
        if ($data) {
            $res = array(
                "cod" => 1,
                "data" => $data
            );
        } else {
            $res = array(
                "cod" => 0,
                "data" => $data
            );
        }
        echo json_encode($res);
    }
    public function GetService($idEmp)
    {
        $data = $this->MODEL->GetService($idEmp);
        return ($data);
    }
    public function InsertAgen()
    {

        $Emp = $_POST['Emp'];
        $Cita = $_POST['CitaDate'];
        $Citafin = $_POST['CitaDateFin'];
        $Service = $_POST['idTbServicios'];
        $UsuCod = $_POST['UsuCod'];
        $Masco = $_POST['idtbMascotas'];
        $citaPre = $_POST['citaPre'];

        $CitaNom = $_POST['CitaNom'];
        $CitaObs = $_POST['CitaObs'];

        // Crear objetos DateTime a partir de las cadenas
        $dateCita = new DateTime($Cita);
        $dateCitafin = new DateTime($Citafin);

        // Formatear las fechas en el formato deseado
        $CitaFormateada = $dateCita->format('Y-m-d H:i');
        $CitafinFormateada = $dateCitafin->format('Y-m-d H:i');

        $validateTurno = $this->MODEL->validateTurnos($Emp, $UsuCod, $Masco, $Service, $CitaFormateada, $CitafinFormateada);
        if (!$validateTurno) {
            $datos = array(
                "id_EmpCrea" => $Emp,
                "idTbEmAsig " => $UsuCod,
                "idtbMascotas" => $Masco,
                "idTbServicios " => $Service,
                "IdCitaPre" => $citaPre,
                "CitaNom" => $CitaNom,
                "CitaDate" => $Cita,
                "CitaDateFin" => $Citafin,
                "CitaObs" => $CitaObs,
            );
            $InsertAgen = $this->MODEL->InsertAgen($datos);
            $res = array(
                "cod" => 1,
                "msm" => 'Cita Agendada exitosamente.',
            );
        } else {
            $res = array(
                "cod" => 0,
                "msm" => 'ya hay citas regitradas en ese rango  de fechas',
            );
        }
        echo json_encode($res);
    }
    public function citasHoy()
    {
        $Emp = $_POST['Emp'];
        $data = $this->MODEL->citasHoy($Emp);
        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Agenda/layout/forCita.php');
        } else {
            echo 'Aún no hay Citas agendadas para hoy.';
        }
        return $data;
    }
    public function PintarCalen()
    {
        $data = $this->MODEL->PintarCalen($_POST['Emp'], $_POST['UsuCod']);
        echo json_encode($data);
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

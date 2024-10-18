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
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

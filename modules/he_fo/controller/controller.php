<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/he_fo/model/model.php';
date_default_timezone_set('America/Bogota');

class Controllerhe
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelohe();
    }
    public function ValidateEst($Emp)
    {
        $data = $this->MODEL->ValidateEst($Emp);
        return $data;
    }
    public function ChangeEstEmp()
    {
        $EX = $this->MODEL->ChangeEstEmp($_POST['Emp'], $_POST['estado']);
    }
}
$Controllerhe = new Controllerhe();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controllerhe, $_POST['funcion']));
}

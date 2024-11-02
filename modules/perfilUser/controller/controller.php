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
        echo json_encode($data);
    }

    public function UpdateDataPerfil()
    {

        $FotoTmpPath = $_FILES['fotoPerfil']['tmp_name'];
        $imge = file_get_contents($FotoTmpPath);
        $fotoPerfil = base64_encode($imge);

        $dataArray = [
            'Nombre' => $_POST['Nombre'],
            'Identificacion' => $_POST['Identificacion'],
            'Direccion' => $_POST['Direccion'],
            'Celular' => $_POST['Celular'],
            'Contrasena' => $_POST['Contrasena'],
            'UsuCod' => $_POST['UsuCod'],
            'User' => $_POST['User'],
            'fotoPerfil' => $fotoPerfil
        ];

        $datos = $this->MODEL->UpdateDataPerfil($dataArray);
        if ($datos == true) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }

    public function ObtMascoPerfil()
    {
        $data = $this->MODEL->ObtMascoPerfil($_POST);
        echo json_encode($data);
    }
}

$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

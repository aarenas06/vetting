<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Pacientes/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller1
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new newMd();
    }
    public function SearchPropi()
    {
        $data = $this->MODEL->SearchPropi($_POST['CC']);
        if ($data) {
            $res = array(
                "cod" => 1,
                "data" => $data
            );
        } else {
            $res = array(
                "cod" => 0,
                "data" => ''
            );
        }
        echo json_encode($res);
    }
    public function InsertMascota()
    {
        // Verifica que el archivo se haya subido correctamente
        if (isset($_FILES['MascoFoto']) && $_FILES['MascoFoto']['error'] === UPLOAD_ERR_OK) {
            $FotoTmpPath = $_FILES['MascoFoto']['tmp_name'];
            $imge = file_get_contents($FotoTmpPath);
            $fotoMasco = base64_encode($imge);
        } else {
            // Si no se sube ninguna imagen, utiliza la imagen alternativa
            $rutaImagenAlternativa = "/vetting/asset/huellitas/imagen-alternativa.jpg"; // Ajusta la ruta según tu estructura de directorios
            $imge = file_get_contents($rutaImagenAlternativa);
            $fotoMasco = base64_encode($imge);
        }

        // Ahora $fotoMasco contendrá la imagen subida o la imagen alternativa en formato base64

        //Bloque para sacar el codigo de mascota "Solo numeros"


        // Prepara el arreglo de datos
        $dataArray = [
            'MascoNom' => $_POST['MascoNom'],
            'MascoFecNaci' => $_POST['MascoFecNaci'],
            'MascoYear' => $_POST['MascoYear'],
            'MascoMes' => $_POST['MascoMes'],
            'MascoSexo' => $_POST['MascoSexo'],
            'MascoPelaje' => $_POST['MascoPelaje'],
            'MascoComida' => $_POST['MascoComida'],
            'MascoCelo' => $_POST['MascoCelo'],
            'MascoAdopcion' => $_POST['MascoAdopcion'],
            'MascoEspecie' => $_POST['MascoEspecie'],
            'MascoRaza' => $_POST['MascoRaza'],
            'MascoPeso' => $_POST['MascoPeso'],
            'MascoVivienda' => $_POST['MascoVivienda'],
            'MascoCod' => $_POST['MascoChip'],
            'MascoChip' => $_POST['MascoChip'],
            'Mascoagresividad' => $_POST['Mascoagresividad'],
            'MascoPatologia' => $_POST['MascoPatologia'],
            'UsuCod' => $_POST['UsuCod'],
            'Estado' => $_POST['Estado'],
            'fotoMasco' => $fotoMasco,
            'IndEmpr' => $_POST['Emp'],
        ];

        $datos = $this->MODEL->InsertMascota($dataArray);
        if (isset($datos)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
    public function ListPaciente()
    {

        $data = $this->MODEL->ListPaciente($_POST['Emp']);

        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Pacientes/layout/tbPaciente.php');
        } else {
            echo 'No tienes Mascotas creadas';
        }
    }
    public function HistoricoMd()
    {

        $data = $this->MODEL->HistoricoMd($_POST['Emp'], $_POST['idMasco']);

        if ($data) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Pacientes/layout/tbHisto.php');
        } else {
            echo 'No tienes Historico Clinico';
        }
    }
}
$controller1 = new Controller1();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller1, $_POST['funcion']));
}

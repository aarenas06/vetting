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

    public function GetModulos()
    {
        $data = $this->MODEL->GetModulos();
        return $data;
    }

    public function selectEspecie()
    {
        $data = $this->MODEL->selectEspecie();
        foreach ($data as $row) {
            echo '<option class="form-control" value="' . $row['idTbEspecies'] . '">' . $row['EspeNom'] . '</option>';
        }
    }

    public function selectRaza()
    {
        $datos = $this->MODEL->selectRaza($_POST);
        echo json_encode($datos);
    }

    //FUNCION PARA GENERAR EL CODIGO UNICO DEL CHIP
    public function MascoIdChip($length = 8)
    {
        // Define el conjunto de caracteres alfanuméricos
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        // Bucle para generar códigos hasta encontrar uno que no exista
        do {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            // Verifica si el código ya existe en la base de datos
            $existingCode = $this->MODEL->checkIfCodeExists($randomString);
        } while ($existingCode);

        return $randomString;
    }

    //FUNCION PARA RETORNAR EL CODIGO DEL CHIP
    public function generarMascoIdChip()
    {
        $codigo = $this->MascoIdChip();
        echo json_encode(['codigo' => $codigo]);
    }


    //FUNCION PARA GENERAR EL CODIGO UNICO MASCOCOD
    public function MascoCod()
    {
        // Define el conjunto de caracteres numéricos
        $characters = '0123456789';
        $charactersLength = strlen($characters);

        // Bucle para generar códigos hasta encontrar uno que no exista
        do {
            $randomString = '';
            for ($i = 0; $i < 8; $i++) { // Longitud fija de 8 dígitos
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            // Verifica si el código ya existe en la base de datos
            $existingCode = $this->MODEL->checkIfMacoCodeExists($randomString);
        } while ($existingCode);

        return $randomString;
    }

    //FUNCION PARA RETORNAR EL CODIGO DEL CHIP
    public function generarMascoCod()
    {
        $codigo = $this->MascoCod();
        echo json_encode(['codigo' => $codigo]);
    }

    public function ChangeEstMasco()
    {
        if ($_POST['Est'] == 1) {
            $new = 2;
        } else {
            $new = 1;
        }
        $update = $this->MODEL->ChangeEstMasco($_POST, $new);
    }

    public function ObtRaza($razaId)
    {
        // Llamada al modelo para obtener la raza
        $raza = $this->MODEL->ObtRaza($razaId);
        return $raza;
    }

    public function listMascotas()
    {
        $datos = $this->MODEL->listMascotas($_POST);
        if ($datos == "vacio") {  // Se usa == para comparar
            echo 'No Hay Mascotas Aún Creadas';
        } else {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Mascotas/layout/listMascotas.php');
        }
    }

    public function InsertMascota()
    {
        // Verifica que el archivo se haya subido correctamente
        $FotoTmpPath = $_FILES['MascoFoto']['tmp_name'];
        $imge = file_get_contents($FotoTmpPath);
        $fotoMasco = base64_encode($imge);

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
            'MascoCod' => $_POST['MascoCod'],
            'MascoChip' => $_POST['MascoCod'],
            'Mascoagresividad' => $_POST['Mascoagresividad'],
            'MascoPatologia' => $_POST['MascoPatologia'],
            'UsuCod' => $_POST['UsuCod'],
            'Estado' => $_POST['Estado'],
            'fotoMasco' => $fotoMasco
        ];

        $datos = $this->MODEL->InsertMascota($dataArray);
        if (isset($datos)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function HistorialMasco()
    {
        $datos = $this->MODEL->HistorialMasco($_POST);
        echo json_encode($datos);
    }

    public function EditDataMasco()
    {
        $datos = $this->MODEL->EditDataMasco($_POST);
        echo json_encode($datos);
    }

    public function SaveEditMasco()
    {
        if (isset($_FILES['EditMascoFoto']) && $_FILES['EditMascoFoto']['tmp_name'] != '') {
            $FotoTmpPath = $_FILES['EditMascoFoto']['tmp_name'];
            $imge = file_get_contents($FotoTmpPath);
            $fotoMasco = base64_encode($imge);
        } else {
            $fotoMasco = '';
        }

        $dataArray = [
            'IdMascoEdit' => $_POST['IdMascoEdit'],
            'EditMascoNom' => $_POST['EditMascoNom'],
            'EditMascoFecNaci' => $_POST['EditMascoFecNaci'],
            'EditMascoYear' => $_POST['EditMascoYear'],
            'EditMascoMes' => $_POST['EditMascoMes'],
            // 'UsuCod' => $_POST['UsuCod'],
            'fotoMasco' => $fotoMasco
        ];

        $datos = $this->MODEL->SaveEditMasco($dataArray);
        if (isset($datos)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

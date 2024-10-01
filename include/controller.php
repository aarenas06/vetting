<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/include/model.php';

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function Validar()
    {
        $user = $_POST['User'];
        $pass = $_POST['Pass'];
        $validar = $this->MODEL->Validar($user, $pass);
        if ($validar) {
            session_start();
            // Almacenar datos en la sesión
            $_SESSION['UsuCod'] = $validar['idTbUsuarios'];
            $_SESSION['User'] = $validar['UsuUser'];
            $_SESSION['Nombre'] = $validar['UsuNom'];
            $_SESSION['Celular'] = $validar['UsuCel'];
            $_SESSION['Direccion'] = $validar['UsuDirec'];
            $_SESSION['Rol'] = $validar['idTbRoles'];

            $_SESSION['RolObs'] = $validar['RolNom'];
            $_SESSION['UsuEmail'] = $validar['UsuEmail'];

           echo json_encode(['idTbRoles' => $validar['idTbRoles'],'success' => 'ok']);

        } else {
            echo json_encode('false');
        }
    }

    public function InsertPropietarios()
    {
        $ValidaExitencia = $this->MODEL->ValidaExitencia($_POST['IdentPropietarios']);

        if ($ValidaExitencia == false) {
            echo json_encode(false);
            exit;
        } else {
            $datos = $this->MODEL->InsertPropietarios($_POST);
            echo json_encode(true);
        }
    }
    
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

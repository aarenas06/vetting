<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Empleados/model/model.php';
date_default_timezone_set('America/Bogota');

class Controller
{
    public $MODEL;
    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function GetRol()
    {
        $data = $this->MODEL->GetRol();
        return $data;
    }
    public function InsertEmpl()
    {

        $Emp = $_POST['Emp'];
        // encuentra Nuevo user
        $Nom = $_POST['EmplNom'];
        $Apel = $_POST['EmplApel'];
        $GetUser = $this->GetUser($Nom, $Apel, $Emp);

        // Obtener la información del empleado
        $GetEmp = $this->MODEL->GetEmp($Emp);

        // Construir la ruta donde se guardará el archivo
        $rutaGuardar = $_SERVER['DOCUMENT_ROOT'] . "/vetting/asset/documentacion/" . $GetEmp['Nom'] . "/Personal/";

        // Verificar si la carpeta existe; si no, crearla
        if (!file_exists($rutaGuardar)) {
            mkdir($rutaGuardar, 0777, true);
        }
        $nombreArchivo = $_FILES['EmplAdjCel']['name'];

        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

        $nombreNuevoArchivo = $GetUser . '.' . $extension;
        $rutaAdj = $rutaGuardar . $nombreNuevoArchivo;

        if (move_uploaded_file($_FILES['EmplAdjCel']['tmp_name'], $rutaAdj)) {
            // El archivo se ha guardado correctamente
        } else {
        }


        $ar = array(
            "idTbEmpresas" => $_POST['Emp'],
            "idTbRoles" => $_POST['EmplRol'],
            "EmpNom" => $_POST['EmplNom'] . ' ' . $_POST['EmplApel'],
            "EmpCod" => $GetUser,
            "EmpNit" => $_POST['EmplCc'],
            "EmpUsu" => $GetUser,
            "EmpCla" => $_POST['EmplCc'],
            "EmpCel" => $_POST['EmplCelu'],
            "EmpEst" => 1,
            "EmpSex" => $_POST['EmpSex'],
            "EmpEmail" => $_POST['EmplEmail'],
            "EmplUsuCrea" => $_POST['UsuCod'],
        );
        $InsertEmpl = $this->MODEL->InsertEmp($ar);
    }
    function GetUser($nombre, $apellido, $emp)
    {
        // Dividir el nombre completo y el apellido en partes
        $nombrePartes = explode(' ', trim($nombre));
        $apellidoPartes = explode(' ', trim($apellido));

        // Generar el primer nombre de usuario usando la inicial del nombre y el primer apellido
        $inicialNombre = strtoupper(substr($nombrePartes[0], 0, 1));
        $primerApellido = strtoupper($apellidoPartes[0]);
        $user = $inicialNombre . $primerApellido;

        // Validar el nombre de usuario en la base de datos
        $validaUser = $this->MODEL->validaUser($user, $emp);

        // Lógica según el resultado de la validación
        if ($validaUser == 1) {
            // Usuario válido, devolver el nombre de usuario
            return $user;
        } elseif ($validaUser == 2) {
            // Configuración adicional para crear un nuevo usuario
            // Aquí puedes crear nuevas alternativas para el nombre de usuario

            // Opción 1: Usar las dos primeras letras del nombre y el primer apellido
            $userAlternativo = strtoupper(substr($nombrePartes[0], 0, 2)) . $primerApellido;

            // Opción 2: Usar la inicial del primer apellido
            $userAlternativo2 = strtoupper(substr($apellidoPartes[0], 0, 1)) . strtoupper(substr($nombrePartes[0], 0, 1)) . $primerApellido;

            // Opción 3: Usar la inicial del primer nombre y del segundo apellido (si existe)
            $segundoApellido = isset($apellidoPartes[1]) ? strtoupper($apellidoPartes[1]) : '';
            $userAlternativo3 = $inicialNombre . $segundoApellido;

            // Verificar la validez de los nombres alternativos
            if ($this->MODEL->validaUser($userAlternativo, $emp) == 1) {
                return $userAlternativo; // Retornar si el primer alternativo es válido
            } elseif ($this->MODEL->validaUser($userAlternativo2, $emp) == 1) {
                return $userAlternativo2; // Retornar si el segundo alternativo es válido
            } elseif ($this->MODEL->validaUser($userAlternativo3, $emp) == 1) {
                return $userAlternativo3; // Retornar si el tercer alternativo es válido
            } else {
                // Si ninguno de los alternativos es válido, podrías crear un nuevo usuario con un sufijo (número)
                $counter = 1;
                do {
                    $userConSufijo = $user . $counter;
                    $counter++;
                } while ($this->MODEL->validaUser($userConSufijo, $emp) != 0); // Asumimos que 0 significa que no existe

                return $userConSufijo; // Retornar el nuevo usuario creado con sufijo
            }
        }

        // Si hay otro código de error o estado, puedes manejarlo aquí
        return null; // O retornar un mensaje de error
    }
    public function ListEmp()
    {
        $emp = $_POST['Emp'];
        $datos = $this->MODEL->ListEmp($emp);
        if ($datos) {
            include($_SERVER['DOCUMENT_ROOT'] . '/vetting/modules/Empleados/layout/ListEmp.php');
        } else {
            echo 'No tienes Personal Creado aún.';
        }
    }
    public function ChangeEstEmpl()
    {
        if ($_POST['Est'] == 1) {
            $new = 2;
        } else {
            $new = 1;
        }
        $update = $this->MODEL->ChangeEstEmpl($_POST['IdEmp'], $new);
    }
    public function infoEmp()
    {
        $data = $this->MODEL->infoEmp($_POST['IdEmp']);
        echo json_encode($data);
    }
    public function UpdateEmp()
    {

        $ex = $this->MODEL->UpdateEmp($_POST);
    }
}
$controller = new Controller();
if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

<?php

session_start(); // Asegúrate de haber iniciado la sesión

// Verifica si las variables de sesión no existen
if (!isset($_SESSION["UsuCod"])) {
    // Muestra el mensaje
    echo '<script>alert("No has iniciado sesión");</script>';

    // Redirige a la pantalla principal
    echo '<script>window.location.href = "http://localhost/vetting/";</script>';
    exit; // Agrega exit para detener la ejecución del script después de la redirección
}

$pagina = isset($_GET['p']) ? $_GET['p'] : 'principal';
$rolUsuario = isset($_SESSION['Tip']) ? $_SESSION['Tip'] : null; // Asegúrate de tener la variable de rol

// Tomar solo el primer segmento antes de cualquier barra (/)
$modulo = explode('/', $pagina)[0];

// Definir qué roles pueden acceder a cada módulo

// 2->Propietario
// 1->Empresa
// 3->Master
$accesosPermitidos = [
    'home' => [2, 3],
    'Home' => [2, 3],
    'Mascotas' => [2, 3],
    'perfilUser' => [1, 3],

    'Agenda' => [1, 3],
    'Clientes' => [1, 3],
    'Dashboard' => [1, 3],
    'DashVet' => [1, 3],
    'Empleados' => [1, 3],
    'Pacientes' => [1, 3],

    'Empresas' => [3],
    'Planes' => [1, 3],
];

// Verificar si el módulo existe en los permisos y si el rol tiene acceso
if (array_key_exists($modulo, $accesosPermitidos) && in_array($rolUsuario, $accesosPermitidos[$modulo])) {
    require_once 'he_fo/header.php';
    echo '<br>';
    require_once  $pagina . '.php'; // Carga la página completa (con el submódulo) solo si tiene permiso
    require_once 'he_fo/footer.php';
} else {
    // Si el usuario no tiene permiso o no está logueado, lo rediriges o muestras un mensaje
    require_once '500.php';
}

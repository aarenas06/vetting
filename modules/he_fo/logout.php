<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/include/model.php';

$MODEL = new modelo();

$Emp = $_GET['ind'];

session_start(); // Asegúrate de que la sesión esté iniciada
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión


if ($Emp == 0) {
    header("Location: /vetting/");
    exit(); // Asegura que el script se detenga después de redirigir
} else {
    $acces = $MODEL->GetTok($Emp);
    header("Location: /vetting/Empresa.php?PreDict=" . urlencode($acces['nit']) . "&pack=" . urlencode($acces['tok']));
    exit(); // Asegura que el script se detenga después de redirigir
}

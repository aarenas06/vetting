<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/include/model.php';

$MODEL = new modelo();

$Emp = $_GET['ind'];

if ($Emp == 0) {
    session_unset();

    session_destroy();

    header("Location: /vetting/");
    exit(); // Asegura que el script se detenga después de redirigir
} else {
    $acces = $MODEL->GetTok($Emp);
    session_unset();

    session_destroy();

    header("Location: /vetting/Empresa.php?PreDict=" . urlencode($acces['nit']) . "&pack=" . urlencode($acces['tok']));
    exit(); // Asegura que el script se detenga después de redirigir
}

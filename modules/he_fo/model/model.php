<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/config/includes/conexion.php';

class modelohe
{
    public $CNX1;
    public function __construct()
    {
        $conexion = new conexion(); // Crear una instancia de la clase conexion
        $this->CNX1 = $conexion->mysql(); // Llamar al método mysql() de la instancia
    }

    public function ValidateEst($Emp)
    {
        $sql = "SELECT EmpreAct FROM `tbempresas` WHERE idTbEmpresas=$Emp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function ChangeEstEmp($Emp, $est)
    {
        $sql = "UPDATE `tbempresas` SET EmpreAct=$est WHERE idTbEmpresas=$Emp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
}
